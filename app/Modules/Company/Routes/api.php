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
    Route::get('employs/export', 'EmployController@employsExport')->name('employsExport');
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
    Route::post('company/update', 'CompanyController@companyUpdate')->name('companyUpdate');
    //部门
    Route::post('department', 'DepartmentController@departmentList')->name('departmentList');
    Route::post('department/create', 'DepartmentController@departmentCreate')->name('departmentCreate');
    Route::post('department/show', 'DepartmentController@departmentShow')->name('departmentShow');
    Route::post('department/update', 'DepartmentController@departmentUpdate')->name('departmentUpdate');
    Route::post('department/delete', 'DepartmentController@departmentDelete')->name('departmentDelete');
    //店铺
    Route::post('stores', 'StoreController@stores')->name('stores');
    Route::post('stores/create', 'StoreController@storesCreate')->name('storesCreate');
    Route::post('stores/manager', 'StoreController@storesManager')->name('storesManager');
    Route::post('stores/area', 'StoreController@getArea')->name('getArea');
    Route::get('stores/export', 'StoreController@storesExport')->name('storesExport');
    //店员
    Route::post('guides', 'GuideController@guides')->name('guides');
    Route::get('guides/export', 'GuideController@guideExport')->name('guideExport');
    Route::post('guides/update/show', 'GuideController@guideUpdateShow')->name('guidesUpdateShow');
    Route::post('guides/update', 'GuideController@guideUpdate')->name('Update');

});
