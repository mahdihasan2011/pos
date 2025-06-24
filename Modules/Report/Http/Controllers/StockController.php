<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Model\Purchase;
use App\Model\Supplier;
use App\Model\Customer;
use App\Model\Company;
use App\Model\Setting;
use App\Model\Stock;
use App\Model\Sale;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $current_st = Stock::orderBy('id', 'DESC')
            ->leftJoin('products', 'products.id', 'stocks.product_id')
            ->leftJoin('categories','products.category','categories.id')
            // ->leftJoin('purchase_items','products.id','purchase_items.product_id')
            ->select('stocks.*','products.image','categories.name as category','products.name as product','products.code',/* DB::raw('SUM(purchase_items.quantity) as purchase_qty') */)
            // ->groupBy('purchase_items.product_id')
            // ->leftJoin('purchase_items', function($join) {
            //     $join->on('products.id', '=', 'purchase_items.product_id');
            //     $join->where('products.id', '=', 'purchase_items.product_id');
            //     $join->addSelect("SUM(purchase_items.quantity) as purchase_qty");
            //     $join->groupBy('purchase_items.product_id');
            // })
            ->where('stocks.status', '=', 1)
            ->get();
        return view('report::stock.current', compact('current_st'));
    }
    public function current_print(Request $request)
    {
        $company    = Company::first();
        $current_st = Stock::orderBy('id', 'DESC')
            ->leftJoin('products', 'products.id', 'stocks.product_id')
            ->leftJoin('categories','products.category','categories.id')
            ->select('stocks.*','products.image','categories.name as category','products.name as product','products.code',/* DB::raw('SUM(purchase_items.quantity) as purchase_qty') */)
            ->where('stocks.status', '=', 1)
            ->get();
        $sQty = $current_st->sum('quantity');
        return view('report::stock.currentPrint', compact('company','current_st','sQty'));
    }
}
