<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Purchase;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Stock;
use App\Model\Supplier;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = new DateTime("now");
        $sales = Sale::all();
        $sales_due = $sales->sum('due');
        $purchases = Purchase::all();
        $purchase_due = $purchases->sum('due');

        $customers = Customer::count();
        $suppliers = Supplier::count();

        $sales = Sale::where('date', $today);
        $today_sales_count = $sales->count();
        $today_sales_qty = $sales->sum('total_qty');
        $today_sales = $sales->sum('payable');
        $purchases = Purchase::where('date', $today);
        $today_purchase_count = $purchases->count();
        $today_purchase_qty = $purchases->sum('total_qty');
        $today_purchase = $purchases->sum('payable');

        $current_st = Stock::orderBy('id', 'DESC')->paginate(5);
        $tQty = $current_st->sum('quantity');
        $tCst = $current_st->sum('cost');
        $tPrc = $current_st->sum('price');

        $latest_items = SaleItem::orderBy('id', 'DESC')->paginate(5);

        return view('backend.dashboard',
            compact('sales_due','purchase_due','customers','suppliers','today_sales_count','today_sales_qty','today_sales','today_purchase_count','today_purchase_qty','today_purchase','current_st','tQty','tCst','tPrc','latest_items'));
    }

}
