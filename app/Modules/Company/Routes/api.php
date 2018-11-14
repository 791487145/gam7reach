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
    // return $request->company();
})->middleware('auth:api');

Route::prefix('company')->group(function () {

    Route::post('login', 'LoginController@companyLogin');

    Route::post('employs', 'EmployController@employsList')->name('employsList');
    Route::post('roles/create', 'EmployController@roleCreate')->name('roleCreate');
    Route::post('roles/show', 'EmployController@roleShow')->name('roleShow');
    Route::post('roles/update/show', 'EmployController@roleUpdateShow')->name('roleUpdateShow');
    Route::post('roles/update', 'EmployController@roleUpdate')->name('roleUpdate');
    Route::post('roles/delete', 'EmployController@roleDelete')->name('roleDelete');

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

});
