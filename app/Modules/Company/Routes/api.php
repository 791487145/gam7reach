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

    Route::post('menus', 'MenuController@menuShow')->name('menuShow');
    Route::post('menus/create', 'MenuController@menuCreate')->name('menuCreate');
    Route::post('menus/update', 'MenuController@menuUpdate')->name('menuUpdate');
    Route::post('menus/delete', 'MenuController@menuDelete')->name('menuDelete');
    Route::post('menus/updown', 'MenuController@upOrDown')->name('upOrDown');
    Route::post('menus/resorts', 'MenuController@resorts')->name('resorts');

});
