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
Route::prefix('/member')->group(function(){
    //会员等级分组
    Route::prefix('grade')->group(function(){
        //会员等级
        Route::post('list','MemberGradeController@list')->name('memberGrade');
        //启用的会员等级
        Route::post('enable/list','MemberGradeController@enableGrade')->name('memberEnableGrade');
        //添加会员等级
        Route::post('add','MemberGradeController@add')->name('memberGradeAdd');
        //编辑会员等级
        Route::match(['get','post'],'edit','MemberGradeController@edit')->name('memberGradeEdit');
        //删除会员等级
        Route::post('/delete','MemberGradeController@delete')->name('memberGradeDelete');

    });
    //会员列表
    Route::post('list','MemberController@list')->name('memberList');
    //添加会员
    Route::post('add','MemberController@add')->name('memberAdd');
    //编辑会员
    Route::match(['get','post'],'edit','MemberController@edit')->name('memberEdit');
    //会员批量操作
    Route::post('batch','MemberController@batch')->name('memberBatch');
    //会员忠诚度分组
    Route::prefix('loyalty')->group(function(){
        //会员中心装修设置
        Route::match(['get','post'],'decoration','LoyaltyController@decoration')->name('memberDecoration');
    });

});
