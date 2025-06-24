<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Model\SaleItem;
use App\Model\Setting;
use App\Model\Company;
use App\Model\Sale;
use DateTime;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datewise(Request $request)
    {
        $fromToDate = $request->fromToDate;
        $startDate  = $request->startDate;
        $endDate    = $request->endDate;
        if ($request->startDate) {
            $sales  = Sale::orderBy('id', 'DESC')
                                ->leftJoin('customers','sales.customer','customers.id')
                                ->select('sales.*','customers.name as customer')
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } else {
            $sales  = Sale::orderBy('id', 'DESC')
                                ->leftJoin('customers','sales.customer','customers.id')
                                ->select('sales.*','customers.name as customer')
                                ->get();
        }
        $tQty = $sales->sum('total_qty');
        $tSub = $sales->sum('sub_total');
        $tPay = $sales->sum('payable');
        $tVat = $sales->sum('vat');
        $tDis = $tSub - $tPay;
        $vat  = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        return view('report::sale.datewise', compact('sales','tQty','tSub','tPay','tDis','fromToDate','startDate','endDate','vat','tVat'));
    }

    public function datewise_print(Request $request)
    {
        $company    = Company::first();
        $startDate  = $request->startDate;
        $endDate    = $request->endDate;
        if ($request->startDate) {
            $sales  = Sale::orderBy('id', 'DESC')
                                ->leftJoin('customers','sales.customer','customers.id')
                                ->select('sales.*','customers.name as customer')
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } else {
            $sales  = Sale::orderBy('id', 'DESC')
                                ->leftJoin('customers','sales.customer','customers.id')
                                ->select('sales.*','customers.name as customer')
                                ->get();
        }
        $tQty = $sales->sum('total_qty');
        $tSub = $sales->sum('sub_total');
        $tVat = $sales->sum('vat');
        $tPay = $sales->sum('payable');
        $tDis = $tSub - $tPay;
        $vat  = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        return view('report::sale.datewisePrint', compact('company','sales','tQty','tSub','tPay','tDis','startDate','endDate','vat','tVat'));
    }

    public function big_invoice(Request $request)
    {
        $company    = Company::first();
        $sales      = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer',
                                    'customers.phone','customers.email','customers.address')
                            ->first();
        $sales_dt   = SaleItem::where('sale_items.sale_no', $request->id)
            ->leftJoin('products', 'sale_items.product_id', 'products.id')
            ->select('sale_items.*','products.code')
            ->get();
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        return view('report::sale.bigInvoice', compact('company','sales','sales_dt','vat'));
    }

    public function bigInvoicePrint(Request $request)
    {
        $company    = Company::first();
        $sales      = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer',
                                    'customers.phone','customers.email','customers.address')
                            ->first();
        $sales_dt   = SaleItem::where('sale_items.sale_no', $request->id)
            ->leftJoin('products', 'sale_items.product_id', 'products.id')
            ->select('sale_items.*','products.code')
            ->get();
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        return view('report::sale.bigInvoicePrint', compact('company','sales','sales_dt','vat'));
    }


    public function mini_invoice(Request $request)
    {
        $company  = Company::first();
        $sale     = Sale::where('sale_no', $request->id)
                        ->leftJoin('customers','sales.customer','customers.id')
                        ->select('sales.*','customers.name as customer','customers.phone','customers.email','customers.address')
                        ->first();
        $sales_dt = SaleItem::where('sale_items.sale_no', $request->id)
                        ->leftJoin('products', 'sale_items.product_id', 'products.id')
                        ->select('sale_items.*','products.code')
                        ->get();
        $vat      = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        return view('report::sale.miniInvoicePrint', compact('company','sale','sales_dt','vat'));
    }

}
