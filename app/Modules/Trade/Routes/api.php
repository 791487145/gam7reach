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

Route::get('/trade', function (Request $request) {
    // return $request->trade();
})->middleware('auth:api');

Route::prefix('trade')->group(function () {

    Route::post('orders', 'OrderController@orderList')->name('orders');
    Route::post('orders/show', 'OrderController@orderShow')->name('orderShow');
    Route::post('orders/send', 'OrderController@orderSend')->name('orderSend');
});
