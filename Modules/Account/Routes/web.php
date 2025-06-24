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

Route::prefix('account')->group(function() {
    Route::get('/', 'AccountController@index');
});
//-------------------------- Expense -------------------------
Route::prefix('account/expense/')->name('expense.')->group(function () {
    Route::get('index', 'ExpenseController@index')->name('index');
    Route::post('store', 'ExpenseController@store')->name('store');
    Route::get('edit', 'ExpenseController@edit')->name('edit');
    Route::post('update', 'ExpenseController@update')->name('update');
    Route::get('destroy', 'ExpenseController@destroy')->name('destroy');
});

//-------------------------- Expense Type -------------------------
Route::prefix('account/expense-type/')->name('expense.type.')->group(function () {
    Route::get('index', 'ExpenseTypeController@index')->name('index');
    Route::post('store', 'ExpenseTypeController@store')->name('store');
    Route::get('edit', 'ExpenseTypeController@edit')->name('edit');
    Route::post('update', 'ExpenseTypeController@update')->name('update');
    Route::get('destroy', 'ExpenseTypeController@destroy')->name('destroy');
});

//-------------------------- Discount Type -------------------------
Route::prefix('account/discount-type/')->name('discount.type.')->group(function () {
    Route::get('index', 'DiscountTypeController@index')->name('index');
    Route::post('store', 'DiscountTypeController@store')->name('store');
    Route::get('edit', 'DiscountTypeController@edit')->name('edit');
    Route::post('update', 'DiscountTypeController@update')->name('update');
    Route::get('destroy', 'DiscountTypeController@destroy')->name('destroy');
});