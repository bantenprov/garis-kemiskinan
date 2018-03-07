<?php

namespace Bantenprov\GarisKemiskinan\Models\Bantenprov\GarisKemiskinan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GarisKemiskinan extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'garis_kemiskinans';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
