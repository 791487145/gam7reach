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
            //会员我的订单
            Route::post('order','MemberController@myOrder')->name('mamberOrder')->name('memberOrder');
            //我的喜欢
            Route::post('favorites','MemberController@favorites')->name('memberFavorites');
            //我的消息
            Route::post('message','MemberController@myMessage')->name('memberMessage');
            //会员我的资料
            Route::match(['get','post'],'info','MemberController@info')->name('memberInfo');
            //会员地址分组
            Route::prefix('addresses')->group(function(){
                //地址列表
                Route::post('list','MemberAddressesController@list')->name('addressesList');
                //添加地址
                Route::post('add','MemberAddressesController@add')->name('addressesAdd');
                //编辑地址
                Route::match(['get','post'],'edit','MemberAddressesController@edit')->name('addressesEdit');
                //删除地址
                Route::post('delete','MemberAddressesController@delete')->name('addressesDelete');
            });
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
