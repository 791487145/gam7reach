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
    //只查询上架商品
    Route::post('online','GoodsController@onlineGoods')->name('goodsOnline');
    //旗舰店商品池
    Route::post('shop/list','GoodsController@shopGoodsList')->name('shopGoodsList');
    //云店商品池
    Route::post('store/list','GoodsController@storeGoodsList')->name('storeGoodsList');
    //添加商品
    Route::post('add','GoodsController@goodsAdd')->name('goodsAdd');
    //添加旗舰店商品
    Route::post('add/shop','GoodsController@addShopGoods')->name('addShopGoods');
    //添加云店商品
    Route::post('add/store','GoodsController@addStoreGoods')->name('addStoreGoods');
    //编辑商品
    Route::match(['get','post'],'edit','GoodsController@editGoods')->name('goodsEdit');
    //编辑旗舰店商品
    Route::match(['get','post'],'edit/shop','GoodsController@editShopGoods')->name('shopGoodsEdit');
    //编辑云店商品
    Route::match(['get','post'],'edit/store','GoodsController@editStoreGoods')->name('storeGoodsEdit');
    //商品池上下架
    Route::post('shelves','GoodsController@shelves')->name('goodsShelves');
    //批量操作
    Route::post('batch','GoodsController@batch')->name('batch');
    //旗舰店批量操作
    Route::post('shop/batch','GoodsController@shopBatch')->name('shopBatch');
    //云店批量操作
    Route::post('store/batch','GoodsController@storeBatch')->name('storeBatch');
});


