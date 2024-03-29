<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(config('auth.defaults.guard'))->prefix('Backend')->name('Admin.')->namespace('App\Http\Controllers')->group(function(){
    Route::middleware(['admin.auth','admin.admin','admin.lockScreen'])->group(function () {
        Route::middleware(['admin.permission'])->group(function() {
            /* 會員管理 */
		    Route::resource('Member', 'Company\UsersController', ['only' => ['index','create','edit']]);
            Route::resource('Point', 'Company\Points\PointController', ['only' => ['index','create','edit']]);
            Route::resource('PointRecords', 'Company\Points\RecordsController', ['only' => ['index','create','edit']]);
            Route::resource('Api/Key', 'Company\Api\KeyController', ['only' => ['index','create','edit']]);
            Route::resource('Products', 'Products\ProductController', ['only' => ['index','create','edit']]);
        });
    });
});