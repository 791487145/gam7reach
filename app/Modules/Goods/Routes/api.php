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
    //商品分组
    Route::post('group','GoodsGroupController@list')->name('goodsGroup');
    //添加商品分组
    Route::post('group/add','GoodsGroupController@add')->name('goodsGroupAdd');
    //商品类目
    Route::post('goods_class','GoodsController@goodsClass')->name('goods_class');
    //总商品池
    Route::post('list','GoodsController@goodsList')->name('goodsList');
    //添加商品
    Route::post('add','GoodsController@goodsAdd')->name('goodsAdd');
    //编辑商品

    //批量操作
    Route::post('batch','GoodsController@batch')->name('goods');
});


