<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// private api
Route::group(['middleware' => 'auth:api', 'namespace' => 'Api\v1', 'prefix' => 'v1'], function(){
    Route::group(['middleware' => ['role:admin|operator']], function () {
        // user
        Route::get('/user', 'UserController@list')->name('user.list');
        Route::delete('/user/{user}', 'UserController@delete')->name('user.delete');
    });
}); 
