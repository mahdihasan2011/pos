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

Route::prefix('merchant')->group(function() {
    Route::get('/', 'MerchantController@index');
});

//-------------------------- Customer -------------------------
Route::prefix('customer/')->name('customer.')->group(function () {
    Route::get('index', 'CustomerController@index')->name('index');
    Route::post('store', 'CustomerController@store')->name('store');
    Route::get('edit/{id}', 'CustomerController@edit')->name('edit');
    Route::post('update', 'CustomerController@update')->name('update');
    Route::get('destroy/{id}', 'CustomerController@destroy')->name('destroy');
});

//-------------------------- Supplier -------------------------
Route::prefix('supplier/')->name('supplier.')->group(function () {
    Route::get('index', 'SupplierController@index')->name('index');
    Route::post('store', 'SupplierController@store')->name('store');
    Route::get('edit/{id}', 'SupplierController@edit')->name('edit');
    Route::post('update', 'SupplierController@update')->name('update');
    Route::get('destroy/{id}', 'SupplierController@destroy')->name('destroy');
});

//-------------------------- Company -------------------------
Route::prefix('company/')->name('company.')->group(function () {
    Route::get('index', 'CompanyController@index')->name('index');
    Route::post('store', 'CompanyController@store')->name('store');
    Route::get('edit', 'CompanyController@edit')->name('edit');
    Route::post('update', 'CompanyController@update')->name('update');
    Route::get('destroy', 'CompanyController@destroy')->name('destroy');
});
//-------------------------- Settings -------------------------
Route::prefix('settings/')->name('settings.')->group(function () {
    Route::get('index', 'SettingController@index')->name('index');
    Route::post('store', 'SettingController@store')->name('store');
    Route::get('edit', 'SettingController@edit')->name('edit');
    Route::post('update', 'SettingController@update')->name('update');
});
