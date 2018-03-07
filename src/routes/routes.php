<?php

Route::group(['prefix' => 'api/garis-kemiskinan', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@index',
        'create'    => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@create',
        'show'      => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@show',
        'store'     => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@store',
        'edit'      => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@edit',
        'update'    => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@update',
        'destroy'   => 'Bantenprov\GarisKemiskinan\Http\Controllers\GarisKemiskinanController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('garis-kemiskinan.index');
    Route::get('/create',       $controllers->create)->name('garis-kemiskinan.create');
    Route::get('/{id}',         $controllers->show)->name('garis-kemiskinan.show');
    Route::post('/',            $controllers->store)->name('garis-kemiskinan.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('garis-kemiskinan.edit');
    Route::put('/{id}',         $controllers->update)->name('garis-kemiskinan.update');
    Route::delete('/{id}',      $controllers->destroy)->name('garis-kemiskinan.destroy');
});
