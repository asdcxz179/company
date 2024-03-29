<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('DinjApi/v1')->middleware('dinjApi')->namespace('App\Http\Controllers')->name('Dinj.')->group(function(){
    Route::middleware(['admin.auth','admin.admin','admin.lockScreen'])->group(function () {
        Route::apiResource('Member', 'Company\UsersController', ['only' => ['index',"store","show","update","destroy"]]);
        Route::apiResource('Point', 'Company\Points\PointController', ['only' => ["store"]]);
        Route::apiResource('PointRecords', 'Company\Points\RecordsController', ['only' => ['index']]);
        Route::resource('Api/Key', 'Company\Api\KeyController');
        Route::resource('Products/Type', 'Products\TypeController', ['only' => ['index']]);
        Route::resource('Products/Channel', 'Products\ChannelController', ['only' => ['index','store','destroy']]);
        Route::resource('Products', 'Products\ProductController');
    });
});
