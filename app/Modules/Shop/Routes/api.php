<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/shop', function (Request $request) {
    // return $request->shop();
})->middleware('auth:api');
Route::prefix('shop')->group(function(){
    Route::namespace('Member')->group(function(){
        Route::post('sendsms','LoginController@sendSms')->name('sendSms');
    });

});