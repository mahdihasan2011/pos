<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Sale;
use App\Model\SaleItem;
use DateTime;
use Illuminate\Http\Request;

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
        $tDis = $tSub - $tPay;
        return view('backend.Reports.Sale.datewise', 
            compact('sales','tQty','tSub','tPay','tDis','fromToDate','startDate','endDate'));
    }

    public function datewise_print(Request $request)
    { 
        $company    = Company::all();
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
        $tDis = $tSub - $tPay;
        return view('backend.Reports.Sale.datewisePrint', 
            compact('company','sales','tQty','tSub','tPay','tDis','startDate','endDate'));
    }

    public function big_invoice(Request $request)
    {
        $company    = Company::all();
        $sales      = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer',
                                    'customers.phone','customers.email','customers.address')
                            ->get();
        $sales_dt   = SaleItem::where('sale_no', $request->id)->get();

        return view('backend.Reports.Sale.bigInvoice', 
            compact('company','sales','sales_dt'));
    }

    public function bigInvoicePrint(Request $request)
    {
        $company    = Company::all();
        $sales      = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer',
                                    'customers.phone','customers.email','customers.address')
                            ->get();
        $sales_dt   = SaleItem::where('sale_no', $request->id)->get();

        return view('backend.Reports.Sale.bigInvoicePrint', 
            compact('company','sales','sales_dt'));
    }

    
    public function mini_invoice(Request $request)
    {
        $company    = Company::all();
        $sales      = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer',
                                    'customers.phone','customers.email','customers.address')
                            ->get();
        $sales_dt   = SaleItem::where('sale_no', $request->id)->get();
        
        return view('backend.Reports.Sale.miniInvoicePrint2', 
            compact('company','sales','sales_dt'));
    }

}
