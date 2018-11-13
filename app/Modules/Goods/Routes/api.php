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

Route::prefix('/goods')->group(function(){
    //总商品池
    Route::post('list','GoodsController@goodsList')->name('goodsList');
    //添加商品
    Route::post('add','GoodsController@goodsAdd')->name('goodsAdd');
    //编辑商品
    //批量操作
    Route::post('batch','GoodsController@batch')->name('goods');
});


