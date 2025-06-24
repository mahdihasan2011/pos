<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('user/')->name('user.')->group(function () {
    Route::get('list', 'UserController@list')->name('list');
    Route::get('management', 'UserController@index')->name('role.index');
    Route::post('add', 'UserController@add')->name('role.add');
    Route::get('edit', 'UserController@edit')->name('role.edit');
    Route::post('update', 'UserController@update')->name('role.update');
    Route::post('change-password', 'UserController@change_password')->name('change.password');
});

//----------------------------- Role ----------------------------
Route::prefix('user/role/')->name('role.')->group(function () {
    Route::get('management', 'RoleController@index')->name('index');
    Route::get('create', 'RoleController@create')->name('create');
    Route::post('store', 'RoleController@store')->name('store');
    Route::get('edit', 'RoleController@edit')->name('edit');
    Route::post('update', 'RoleController@update')->name('update');
});
//-------------------------- User Profile -------------------------
Route::prefix('user/profile')->name('profile.')->group(function () {
    Route::post('/image', 'UserController@profile_image')->name('image');

});