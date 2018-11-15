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

Route::get('/company', function (Request $request) {

})->middleware('auth:api');

Route::prefix('company')->group(function () {

    Route::post('login', 'LoginController@companyLogin');
    //员工管理
    Route::post('employs', 'EmployController@employsList')->name('employsList');
    Route::post('employs/create', 'EmployController@employCreate')->name('employCreate');
    Route::post('roles/create/show', 'EmployController@employCreateShow')->name('employCreate');
    Route::post('employs/update/show', 'EmployController@employUpdateShow')->name('employUpdate');
    Route::post('employs/update', 'EmployController@employUpdate')->name('employUpdate');
    Route::post('employs/password', 'EmployController@employPassword')->name('employPassword');
    //角色管理
    Route::post('roles', 'RoleController@roleList')->name('roleList');
    Route::post('roles/create', 'RoleController@roleCreate')->name('roleCreate');
    Route::post('roles/show', 'RoleController@roleShow')->name('roleShow');
    Route::post('roles/update/show', 'RoleController@roleUpdateShow')->name('roleUpdateShow');
    Route::post('roles/update', 'RoleController@roleUpdate')->name('roleUpdate');
    Route::post('roles/delete', 'RoleController@roleDelete')->name('roleDelete');

    Route::post('menus', 'MenuController@menuShow')->name('menuShow');
    Route::post('menus/create', 'MenuController@menuCreate')->name('menuCreate');
    Route::post('menus/update', 'MenuController@menuUpdate')->name('menuUpdate');
    Route::post('menus/delete', 'MenuController@menuDelete')->name('menuDelete');
    Route::post('menus/updown', 'MenuController@upOrDown')->name('upOrDown');
    Route::post('menus/resorts', 'MenuController@resorts')->name('resorts');
    //品牌管理
    Route::post('company', 'CompanyController@company')->name('company');
    Route::post('menus/create', 'MenuController@menuCreate')->name('menuCreate');
    Route::post('menus/update', 'MenuController@menuUpdate')->name('menuUpdate');
    Route::post('menus/delete', 'MenuController@menuDelete')->name('menuDelete');
    Route::post('menus/updown', 'MenuController@upOrDown')->name('upOrDown');
    Route::post('menus/resorts', 'MenuController@resorts')->name('resorts');

});
