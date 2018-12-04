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
        //发送短信
        Route::post('sendsms','LoginController@sendSms')->name('sendSms');
        //会员分组
        Route::prefix('member')->group(function(){
            //会员登录
            Route::post('login','LoginController@login')->name('shopLogin');
            //会员中心
            Route::post('home','MemberController@home')->name('memberHome');
            //会员我的资料
            Route::match(['get','post'],'info','MemberController@info')->name('memberinfo');
        });
    });
    //购物车
    Route::namespace('Cart')->group(function(){

        Route::post('carts','CartController@carts')->name('carts');
        Route::prefix('cart')->group(function(){
            Route::post('delete','CartController@cartDelete')->name('cartDelete');
            Route::post('update','CartController@cartUpdate')->name('cartUpdate');

        });
    });

});
