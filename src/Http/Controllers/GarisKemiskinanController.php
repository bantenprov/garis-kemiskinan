<?php

namespace Bantenprov\GarisKemiskinan\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\GarisKemiskinan\Facades\GarisKemiskinanFacade;

/* Models */
use Bantenprov\GarisKemiskinan\Models\Bantenprov\GarisKemiskinan\GarisKemiskinan;

/* Etc */
use Validator;

/**
 * The GarisKemiskinanController class.
 *
 * @package Bantenprov\GarisKemiskinan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class GarisKemiskinanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GarisKemiskinan $garis_kemiskinan)
    {
        $this->garis_kemiskinan = $garis_kemiskinan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->garis_kemiskinan->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->garis_kemiskinan->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $garis_kemiskinan = $this->garis_kemiskinan;

        $response['garis_kemiskinan'] = $garis_kemiskinan;
        $response['status'] = true;

        return response()->json($garis_kemiskinan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GarisKemiskinan  $garis_kemiskinan
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garis_kemiskinan = $this->garis_kemiskinan;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:garis_kemiskinans,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $garis_kemiskinan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $garis_kemiskinan->label = $request->input('label');
                $garis_kemiskinan->description = $request->input('description');
                $garis_kemiskinan->save();

                $response['message'] = 'success';
            }
        } else {
            $garis_kemiskinan->label = $request->input('label');
            $garis_kemiskinan->description = $request->input('description');
            $garis_kemiskinan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garis_kemiskinan = $this->garis_kemiskinan->findOrFail($id);

        $response['garis_kemiskinan'] = $garis_kemiskinan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GarisKemiskinan  $garis_kemiskinan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $garis_kemiskinan = $this->garis_kemiskinan->findOrFail($id);

        $response['garis_kemiskinan'] = $garis_kemiskinan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GarisKemiskinan  $garis_kemiskinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $garis_kemiskinan = $this->garis_kemiskinan->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:garis_kemiskinans,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $garis_kemiskinan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $garis_kemiskinan->label = $request->input('label');
                $garis_kemiskinan->description = $request->input('description');
                $garis_kemiskinan->save();

                $response['message'] = 'success';
            }
        } else {
            $garis_kemiskinan->label = $request->input('label');
            $garis_kemiskinan->description = $request->input('description');
            $garis_kemiskinan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GarisKemiskinan  $garis_kemiskinan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $garis_kemiskinan = $this->garis_kemiskinan->findOrFail($id);

        if ($garis_kemiskinan->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
