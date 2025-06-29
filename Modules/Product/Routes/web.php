<?php

use Illuminate\Support\Facades\Route;

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

//-------------------------- Product -------------------------
Route::prefix('product/')->name('product.')->group(function () {
    Route::get('index', 'ProductController@index')->name('index');
    Route::get('entry', 'ProductController@entry')->name('entry');
    Route::post('store', 'ProductController@store')->name('store');
    Route::get('edit', 'ProductController@edit')->name('edit');
    Route::post('update', 'ProductController@update')->name('update');
    Route::get('destroy', 'ProductController@destroy')->name('destroy');
});

//-------------------------- Category -------------------------
Route::prefix('product/category/')->name('category.')->group(function () {
    Route::get('index', 'CategoryController@index')->name('index');
    Route::post('store', 'CategoryController@store')->name('store');
    Route::get('edit', 'CategoryController@edit')->name('edit');
    Route::post('update', 'CategoryController@update')->name('update');
    Route::get('destroy', 'CategoryController@destroy')->name('destroy');
});

//-------------------------- Group -------------------------
Route::prefix('product/group/')->name('group.')->group(function () {
    Route::get('index', 'GroupController@index')->name('index');
    Route::post('store', 'GroupController@store')->name('store');
    Route::get('edit', 'GroupController@edit')->name('edit');
    Route::post('update', 'GroupController@update')->name('update');
    Route::get('destroy', 'GroupController@destroy')->name('destroy');
});

//-------------------------- Brand -------------------------
Route::prefix('product/brand/')->name('brand.')->group(function () {
    Route::get('index', 'BrandController@index')->name('index');
    Route::post('store', 'BrandController@store')->name('store');
    Route::get('edit', 'BrandController@edit')->name('edit');
    Route::post('update', 'BrandController@update')->name('update');
    Route::get('destroy', 'BrandController@destroy')->name('destroy');
});

//-------------------------- Type -------------------------
Route::prefix('product/type/')->name('type.')->group(function () {
    Route::get('index', 'TypeController@index')->name('index');
    Route::post('store', 'TypeController@store')->name('store');
    Route::get('edit', 'TypeController@edit')->name('edit');
    Route::post('update', 'TypeController@update')->name('update');
    Route::get('destroy', 'TypeController@destroy')->name('destroy');
});

//-------------------------- Size -------------------------
Route::prefix('product/size/')->name('size.')->group(function () {
    Route::get('index', 'SizeController@index')->name('index');
    Route::post('store', 'SizeController@store')->name('store');
    Route::get('edit', 'SizeController@edit')->name('edit');
    Route::post('update', 'SizeController@update')->name('update');
    Route::get('destroy', 'SizeController@destroy')->name('destroy');
});

//-------------------------- Color -------------------------
Route::prefix('product/color/')->name('color.')->group(function () {
    Route::get('index', 'ColorController@index')->name('index');
    Route::post('store', 'ColorController@store')->name('store');
    Route::get('edit', 'ColorController@edit')->name('edit');
    Route::post('update', 'ColorController@update')->name('update');
    Route::get('destroy', 'ColorController@destroy')->name('destroy');
});