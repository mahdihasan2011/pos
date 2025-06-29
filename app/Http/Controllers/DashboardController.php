<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Expense;
use App\Model\Purchase;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Stock;
use App\Model\Supplier;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = new DateTime("now");
        $today = $date->format('Y-m-d');
        $thisMonth = $date->format('F');
        $sales_due = Sale::sum('due');
        $purchase_due = Purchase::sum('due');
        $customers = Customer::count();
        $suppliers = Supplier::count();

        $sales = Sale::where('date', $today);
        $today_sales_count = $sales->count();
        $today_sales_qty = $sales->sum('total_qty');
        $today_sales = $sales->sum('payable');
        $this_month_sale = Sale::whereMonth('date', $date->format('m'))->sum('payable');

        $purchases = Purchase::where('date', $today);
        $today_purchase_count = $purchases->count();
        $today_purchase_qty = $purchases->sum('total_qty');
        $today_purchase = $purchases->sum('payable');

        $current_st = Stock::orderBy('id', 'DESC')
            ->leftJoin('products', 'stocks.product_id', 'products.id')
            ->select('stocks.*', 'products.code')
            ->limit(5)
            ->get();
        $tQty = $current_st->sum('quantity');
        $tCst = $current_st->sum('cost');
        $tPrc = $current_st->sum('price');

        $saletems = DB::select("SELECT sale_items.product_id, sale_items.price, products.name, products.code, COUNT(sale_items.quantity) AS MostSold FROM sale_items LEFT JOIN products ON sale_items.product_id = products.id GROUP BY sale_items.product_id, sale_items.price, products.name, products.code ORDER BY MostSold DESC");
        $collection = collect($saletems);
        $ids = SaleItem::all();
        $id = [];
        foreach ($ids as $item)
        {
            $id[] = $item->product_id;
        }
        $latest_items = $collection->whereIn('product_id', $id);

        //        $startMonth = Carbon::now()->month($date->format('m'))->startOfMonth()->format("Y-m-d");
//        $endMonth = Carbon::now()->month($date->format('m'))->endOfMonth()->format("Y-m-d");

        //        $begin = new DateTime( $startMonth);
//        $end   = new DateTime( $endMonth );
//        for($i = $begin; $i <= $end; $i->modify('+1 day')){
//            $i->format("d");
//        }
//        $period = CarbonPeriod::create($begin, '1 day', $end);
//        foreach ($period as $dt) {
//            echo $dt->format("d") . "<br>\n";
//            dd($dt);
//        }

        $daysCount = Carbon::createFromDate($date->format('Y'), $date->format('m'), 1)->daysInMonth;
        $salesData = Sale::selectRaw("COUNT(*) as count, payable, DATE_FORMAT(date, '%d') as date")
            ->whereBetween('date', [
                Carbon::createFromDate($date->format('Y'), $date->format('m'), 1),
                Carbon::createFromDate($date->format('Y'), $date->format('m'), $daysCount)
            ])
            ->groupBy('payable', 'date')
            ->get();
        $purchaseData = Purchase::selectRaw("COUNT(*) as count, payable, DATE_FORMAT(date, '%d') as date")
            ->whereBetween('date', [
                Carbon::createFromDate($date->format('Y'), $date->format('m'), 1),
                Carbon::createFromDate($date->format('Y'), $date->format('m'), $daysCount)
            ])
            ->groupBy('payable', 'date')
            ->get();
        $today_expense = Expense::where('date', $today)->sum('amount');
        $this_month_expense = Expense::whereBetween('date', [
            Carbon::createFromDate($date->format('Y'), $date->format
            ('m'), 1),
            Carbon::createFromDate($date->format('Y'), $date->format('m'), $daysCount)
        ])->sum('amount');
        return view('backend.Home.dashboard2', compact('sales_due', 'purchase_due', 'customers', 'suppliers', 'today_sales_count', 'today_sales_qty', 'today_sales', 'today_purchase_count', 'today_purchase_qty', 'today_purchase', 'current_st', 'tQty', 'tCst', 'tPrc', 'latest_items', 'this_month_sale', 'thisMonth', 'salesData', 'purchaseData', 'today_expense', 'this_month_expense'));
    }

}
