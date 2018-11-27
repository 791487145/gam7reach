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

Route::get('/appcenter', function (Request $request) {
    // return $request->appcenter();
})->middleware('auth:api');

Route::prefix('app')->group(function(){
    //优惠卷分组
    Route::prefix('coupon')->group(function(){
        //优惠券适用店铺列表
        Route::post('range_store','CouponController@rangeList')->name('range_store');
        //优惠券列表
        Route::post('list','CouponController@list')->name('couponList');
        //添加优惠券
        Route::post('add','CouponController@add')->name('couponAdd');
        //编辑优惠卷
        Route::match(['get','post'],'edit','CouponController@edit')->name('couponEdit');
        //优惠券推广

    });
});