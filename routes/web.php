<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\StockController;

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

Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false,
]);
Route::get('/', function () {
    if (Auth::check()) {
        // return redirect()->action('HomeController@index');
        return redirect('/dashboard');
    } else {
        // return view('pos::index');
        // return view('auth.login');
        // return view('frontend.login');
        return view('frontend.welcome');
        // return redirect('/login');
    }
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// //-------------------------- Customer -------------------------
// Route::prefix('customer/')->name('customer.')->group(function () {
//     Route::get('index', 'CustomerController@index')->name('index');
//     Route::post('store', 'CustomerController@store')->name('store');
//     Route::get('edit/{id}', 'CustomerController@edit')->name('edit');
//     Route::post('update', 'CustomerController@update')->name('update');
//     Route::get('destroy/{id}', 'CustomerController@destroy')->name('destroy');
// });

// //-------------------------- Supplier -------------------------
// Route::prefix('supplier/')->name('supplier.')->group(function () {
//     Route::get('index', 'SupplierController@index')->name('index');
//     Route::post('store', 'SupplierController@store')->name('store');
//     Route::get('edit/{id}', 'SupplierController@edit')->name('edit');
//     Route::post('update', 'SupplierController@update')->name('update');
//     Route::get('destroy/{id}', 'SupplierController@destroy')->name('destroy');
// });

// //-------------------------- Company -------------------------
// Route::prefix('company/')->name('company.')->group(function () {
//     Route::get('index', 'CompanyController@index')->name('index');
//     Route::post('store', 'CompanyController@store')->name('store');
//     Route::get('edit', 'CompanyController@edit')->name('edit');
//     Route::post('update', 'CompanyController@update')->name('update');
//     Route::get('destroy', 'CompanyController@destroy')->name('destroy');
// });

// //-------------------------- Product -------------------------
// Route::prefix('product/')->name('product.')->group(function () {
//     Route::get('index', 'ProductController@index')->name('index');
//     Route::get('entry', 'ProductController@entry')->name('entry');
//     Route::post('store', 'ProductController@store')->name('store');
//     Route::get('edit', 'ProductController@edit')->name('edit');
//     Route::post('update', 'ProductController@update')->name('update');
//     Route::get('destroy', 'ProductController@destroy')->name('destroy');
// });

// //-------------------------- Category -------------------------
// Route::prefix('category/')->name('category.')->group(function () {
//     Route::get('index', 'CategoryController@index')->name('index');
//     Route::post('store', 'CategoryController@store')->name('store');
//     Route::get('edit', 'CategoryController@edit')->name('edit');
//     Route::post('update', 'CategoryController@update')->name('update');
//     Route::get('destroy', 'CategoryController@destroy')->name('destroy');
// });

// //-------------------------- Group -------------------------
// Route::prefix('group/')->name('group.')->group(function () {
//     Route::get('index', 'GroupController@index')->name('index');
//     Route::post('store', 'GroupController@store')->name('store');
//     Route::get('edit', 'GroupController@edit')->name('edit');
//     Route::post('update', 'GroupController@update')->name('update');
//     Route::get('destroy', 'GroupController@destroy')->name('destroy');
// });

// //-------------------------- Brand -------------------------
// Route::prefix('brand/')->name('brand.')->group(function () {
//     Route::get('index', 'BrandController@index')->name('index');
//     Route::post('store', 'BrandController@store')->name('store');
//     Route::get('edit', 'BrandController@edit')->name('edit');
//     Route::post('update', 'BrandController@update')->name('update');
//     Route::get('destroy', 'BrandController@destroy')->name('destroy');
// });

// //-------------------------- Type -------------------------
// Route::prefix('type/')->name('type.')->group(function () {
//     Route::get('index', 'TypeController@index')->name('index');
//     Route::post('store', 'TypeController@store')->name('store');
//     Route::get('edit', 'TypeController@edit')->name('edit');
//     Route::post('update', 'TypeController@update')->name('update');
//     Route::get('destroy', 'TypeController@destroy')->name('destroy');
// });

// //-------------------------- Size -------------------------
// Route::prefix('size/')->name('size.')->group(function () {
//     Route::get('index', 'SizeController@index')->name('index');
//     Route::post('store', 'SizeController@store')->name('store');
//     Route::get('edit', 'SizeController@edit')->name('edit');
//     Route::post('update', 'SizeController@update')->name('update');
//     Route::get('destroy', 'SizeController@destroy')->name('destroy');
// });

// //-------------------------- Color -------------------------
// Route::prefix('color/')->name('color.')->group(function () {
//     Route::get('index', 'ColorController@index')->name('index');
//     Route::post('store', 'ColorController@store')->name('store');
//     Route::get('edit', 'ColorController@edit')->name('edit');
//     Route::post('update', 'ColorController@update')->name('update');
//     Route::get('destroy', 'ColorController@destroy')->name('destroy');
// });

// //-------------------------- Purchase -------------------------
// Route::prefix('purchase/')->name('purchase.')->group(function () {
//     Route::get('/', 'PurchaseController@index')->name('index');
//     Route::post('users/store', 'PurchaseController@supplier_store')->name('supplier.store');
//     Route::get('item-add', 'PurchaseController@item_add')->name('item.add');
//     Route::get('item/remove/{id}', 'PurchaseController@item_remove')->name('item.remove');
//     Route::get('cart-clear', 'PurchaseController@cart_clear')->name('cart.clear');
//     Route::get('item-quantity', 'PurchaseController@item_quantity')->name('item.quantity');
//     Route::get('item-price', 'PurchaseController@item_price')->name('item.price');
//     Route::get('discount', 'PurchaseController@discount')->name('discount');
//     Route::get('discount-type', 'PurchaseController@discount_type')->name('discount.type');
//     Route::get('paid-amount', 'PurchaseController@paid_amount')->name('paid.amount');
//     Route::post('item-store', 'PurchaseController@item_store')->name('item.store');
//     Route::get('invoice', 'PurchaseController@mini_invoice')->name('mini.invoice');
// });

//-------------------------- Pos -------------------------
Route::prefix('point-of-sale/')->name('pos.')->group(function () {
    Route::get('/', 'PoSController@pos')->name('point_of_sale');
    Route::get('product-search', 'PoSController@product_search')->name('product.search');
    Route::get('product-add', 'PoSController@product_add')->name('product.add');
    Route::get('customer-discount', 'PoSController@customer_discount')->name('customer.discount');
    Route::get('cash-discount', 'PoSController@cash_discount')->name('cash.discount');
    Route::post('customer-store', 'PoSController@customer_store')->name('customer.store');
    Route::get('item-add', 'PoSController@item_add')->name('item.add');
    Route::get('item/remove/{id}', 'PoSController@item_remove')->name('item.remove');
    Route::get('cart-clear', 'PoSController@cart_clear')->name('cart.clear');
    Route::get('item-quantity', 'PoSController@item_quantity')->name('item.quantity');
    Route::get('item-price', 'PoSController@item_price')->name('item.price');
    Route::get('discount', 'PoSController@discount')->name('discount');
    Route::get('discount-type', 'PoSController@discount_type')->name('discount.type');
    Route::get('paid-amount', 'PoSController@paid_amount')->name('paid.amount');
    Route::post('item-store', 'PoSController@item_store')->name('item.store');
    Route::get('invoice', 'PoSController@mini_invoice')->name('mini.invoice');
});

// //-------------------------- Stock -------------------------
// Route::prefix('stock/')->name('stock.')->group(function () {
//     Route::get('current', 'StockController@current')->name('current');
//     Route::get('edit', 'StockController@edit')->name('edit');
//     Route::post('update', 'StockController@update')->name('update');
//     Route::get('destroy', 'StockController@destroy')->name('destroy');
// });

//---------------------------- Report ---------------------------
// ///Purchase
// Route::prefix('purchase-report/')->name('purchase.report.')->group(function () {
//     Route::get('datewise', 'Reports\PurchaseController@datewise')->name('datewise');
//     Route::get('datewise-print', 'Reports\PurchaseController@datewise_print')->name('datewise.print');
//     Route::get('Invoice', 'Reports\PurchaseController@big_invoice')->name('big.invoice');
//     Route::get('Invoice-print', 'Reports\PurchaseController@bigInvoicePrint')->name('invoice.print');
//     Route::get('invoice', 'Reports\PurchaseController@mini_invoice')->name('mini.invoice');

// });
// ///Sales
// Route::prefix('sales-report/')->name('sales.report.')->group(function () {
//     Route::get('datewise', 'Reports\SaleController@datewise')->name('datewise');
//     Route::get('datewise-print', 'Reports\SaleController@datewise_print')->name('datewise.print');
//     Route::get('Invoice', 'Reports\SaleController@big_invoice')->name('big.invoice');
//     Route::get('Invoice-print', 'Reports\SaleController@bigInvoicePrint')->name('invoice.print');
//     Route::get('invoice', 'Reports\SaleController@mini_invoice')->name('mini.invoice');

///Stock
Route::get('current-stock-report', [StockController::class, 'index']);
Route::get('current-stock-report-print', [StockController::class, 'current_print']);
//---------------------------- End Report ---------------------------

//----------------------------- User-Role ----------------------------
// Route::prefix('user-role/')->name('user.')->group(function () {
//     Route::get('management', 'UserController@index')->name('role.index');
//     Route::post('add', 'UserController@add')->name('role.add');
//     Route::get('edit', 'UserController@edit')->name('role.edit');
//     Route::post('update', 'UserController@update')->name('role.update');
//     Route::post('change-password', 'UserController@change_password')->name('change.password');
// });

// //----------------------------- Role ----------------------------
// Route::prefix('role/')->name('role.')->group(function () {
//     Route::get('management', 'RoleController@index')->name('index');
//     Route::get('create', 'RoleController@create')->name('create');
//     Route::post('store', 'RoleController@store')->name('store');
//     Route::get('edit', 'RoleController@edit')->name('edit');
//     Route::post('update', 'RoleController@update')->name('update');
// });

//-------------------------- Settings -------------------------
Route::prefix('settings/')->name('settings.')->group(function () {
    Route::get('index', 'SettingController@index')->name('index');
    Route::post('store', 'SettingController@store')->name('store');
    Route::get('edit', 'SettingController@edit')->name('edit');
    Route::post('update', 'SettingController@update')->name('update');
});

//-------------------------- Image Upload -------------------------
Route::post('/image-upload', 'UserController@image_upload')->name('image.upload');

// //-------------------------- User Profile -------------------------
// Route::prefix('profile')->name('profile.')->group(function () {
//     Route::post('/image', 'UserController@profile_image')->name('image');

// });

// //-------------------------- Expense -------------------------
// Route::prefix('expense/')->name('expense.')->group(function () {
//     Route::get('index', 'ExpenseController@index')->name('index');
//     Route::post('store', 'ExpenseController@store')->name('store');
//     Route::get('edit', 'ExpenseController@edit')->name('edit');
//     Route::post('update', 'ExpenseController@update')->name('update');
//     Route::get('destroy', 'ExpenseController@destroy')->name('destroy');
// });

//-------------------------- Expense Type -------------------------
Route::prefix('expense-type/')->name('expense.type.')->group(function () {
    Route::get('index', 'ExpenseTypeController@index')->name('index');
    Route::post('store', 'ExpenseTypeController@store')->name('store');
    Route::get('edit', 'ExpenseTypeController@edit')->name('edit');
    Route::post('update', 'ExpenseTypeController@update')->name('update');
    Route::get('destroy', 'ExpenseTypeController@destroy')->name('destroy');
});

//-------------------------- Discount Type -------------------------
Route::prefix('discount-type/')->name('discount.type.')->group(function () {
    Route::get('index', 'DiscountTypeController@index')->name('index');
    Route::post('store', 'DiscountTypeController@store')->name('store');
    Route::get('edit', 'DiscountTypeController@edit')->name('edit');
    Route::post('update', 'DiscountTypeController@update')->name('update');
    Route::get('destroy', 'DiscountTypeController@destroy')->name('destroy');
});
