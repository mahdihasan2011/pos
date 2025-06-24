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
//-------------------------- Purchase -------------------------
Route::prefix('pos/purchase/')->name('purchase.')->group(function () {
    Route::get('/', 'PurchaseController@index')->name('index');
    Route::post('users/store', 'PurchaseController@supplier_store')->name('supplier.store');
    Route::get('item-add', 'PurchaseController@item_add')->name('item.add');
    Route::get('item/remove/{id}', 'PurchaseController@item_remove')->name('item.remove');
    Route::get('cart-clear', 'PurchaseController@cart_clear')->name('cart.clear');
    Route::get('item-quantity', 'PurchaseController@item_quantity')->name('item.quantity');
    Route::get('item-price', 'PurchaseController@item_price')->name('item.price');
    Route::get('discount', 'PurchaseController@discount')->name('discount');
    Route::get('discount-type', 'PurchaseController@discount_type')->name('discount.type');
    Route::get('paid-amount', 'PurchaseController@paid_amount')->name('paid.amount');
    Route::post('item-store', 'PurchaseController@item_store')->name('item.store');
    Route::get('invoice', 'PurchaseController@mini_invoice')->name('mini.invoice');
});
//-------------------------- Stock -------------------------
Route::prefix('pos/stock/')->name('stock.')->group(function () {
    Route::get('current', 'StockController@current')->name('current');
    Route::get('edit', 'StockController@edit')->name('edit');
    Route::post('update', 'StockController@update')->name('update');
    Route::get('destroy', 'StockController@destroy')->name('destroy');
});
//-------------------------- Pos -------------------------
Route::prefix('pos/')->name('pos.')->group(function() {
    Route::get('/', 'PosController@index')->name('terminal');
    Route::get('product-search', 'PosController@product_search')->name('product.search');
    Route::get('product-add', 'PosController@product_add')->name('product.add');
    Route::get('customer-discount', 'PosController@customer_discount')->name('customer.discount');
    Route::get('cash-discount', 'PosController@cash_discount')->name('cash.discount');
    Route::post('customer-store', 'PosController@customer_store')->name('customer.store');
    Route::get('item-add', 'PosController@item_add')->name('item.add');
    Route::get('item/remove/{id}', 'PosController@item_remove')->name('item.remove');
    Route::get('cart-clear', 'PosController@cart_clear')->name('cart.clear');
    Route::get('item-quantity', 'PosController@item_quantity')->name('item.quantity');
    Route::get('item-price', 'PosController@item_price')->name('item.price');
    Route::get('discount', 'PosController@discount')->name('discount');
    Route::get('discount-type', 'PosController@discount_type')->name('discount.type');
    Route::get('paid-amount', 'PosController@paid_amount')->name('paid.amount');
    Route::post('item-store', 'PosController@item_store')->name('item.store');
    Route::get('invoice', 'PosController@mini_invoice')->name('mini.invoice');
});
