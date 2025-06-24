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

Route::prefix('report')->group(function() {
    Route::get('/', 'ReportController@index');
});
///Purchase
Route::prefix('report/purchase/')->name('purchase.report.')->group(function () {
    Route::get('datewise', 'PurchaseController@datewise')->name('datewise');
    Route::get('datewise-print', 'PurchaseController@datewise_print')->name('datewise.print');
    Route::get('Invoice', 'PurchaseController@big_invoice')->name('big.invoice');
    Route::get('Invoice-print', 'PurchaseController@bigInvoicePrint')->name('invoice.print');
    Route::get('invoice', 'PurchaseController@mini_invoice')->name('mini.invoice');

});
///Sales
Route::prefix('report/sales/')->name('sales.report.')->group(function () {
    Route::get('datewise', 'SaleController@datewise')->name('datewise');
    Route::get('datewise-print', 'SaleController@datewise_print')->name('datewise.print');
    Route::get('Invoice', 'SaleController@big_invoice')->name('big.invoice');
    Route::get('Invoice-print', 'SaleController@bigInvoicePrint')->name('invoice.print');
    Route::get('invoice', 'SaleController@mini_invoice')->name('mini.invoice');

});
///Stock
Route::prefix('report/stock/')->group(function () {
    Route::get('current', [StockController::class, 'index']);
    Route::get('current-print', [StockController::class, 'current_print']);
});
