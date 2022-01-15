<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Purchase;
use App\Model\Supplier;
use App\Model\PurchaseItem;
use DateTime;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datewise(Request $request)
    { 
        // $d = new DateTime("now");
        // $today = $d->format('Y-m-d');
        // $fromdate = $request->fromdate;
        // if ($request->todate) {  
        //     $todate = $request->todate; 
        // } else { 
        //     $todate = $today; 
        // }
        // $from_to_date = $request->from_to_date;
        // $startDate = $from_to_date('start');
        // $endDate = $from_to_date('end');
        // dd($from_to_date);
        // var fromdate = $('.Date').data('daterangepicker').startDate.format('YYYY-MM-DD');
        // dd($fromdate,$todate);
        // $purchases = Purchase::orderBy('id', 'DESC')
        //                         ->leftJoin('suppliers','purchases.supplier','suppliers.id')
        //                         ->select('purchases.*','suppliers.name as supplier')
        //                         // ->where('date', $from_to_date)
        //                         ->whereBetween('date', [$fromdate, $todate])
        //                         // ->whereBetween('date', $from_to_date)
        //                         ->get();
        $fromToDate = $request->fromToDate;
        $suppliers  = Supplier::orderBy('id', 'DESC')->get();
        // if ($request->fromToDate) {  
        //     $fromToDate = $request->fromToDate; 
        // } else { 
        //     $fromToDate = 'Select Date'; 
        // }
        $startDate  = $request->startDate;
        $endDate    = $request->endDate;
        $supplier   = $request->supplier;
        if ($request->supplier && $request->startDate) {  
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->where('purchases.supplier', $supplier)
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } elseif ($request->supplier) { 
        dd($supplier); 
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->where('purchases.supplier', $supplier)
                                ->get();
        } elseif ($request->startDate) {  
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } else { 
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->get();
        }
        $tQty = $purchases->sum('total_qty');
        $tSub = $purchases->sum('sub_total');
        $tPay = $purchases->sum('payable');
        $tDis = $tSub - $tPay;
        // return view('backend.Reports.Purchase.datewise', 
        return view('backend.Reports.Purchase.supplier&datewise', 
            compact('suppliers','supplier','purchases','tQty','tSub','tPay','tDis',
                    'fromToDate','startDate','endDate'));
    }

    public function datewise_print(Request $request)
    { 
        $company    = Company::all();
        $startDate  = $request->startDate;
        $endDate    = $request->endDate;
        $supplier   = $request->supplier;
        if ($request->supplier) {  
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->where('purchases.supplier', $supplier)
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } elseif ($request->startDate) {  
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->whereBetween('date', [$startDate, $endDate])
                                ->get();
        } else { 
            $purchases  = Purchase::orderBy('id', 'DESC')
                                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                                ->select('purchases.*','suppliers.name as supplier')
                                ->get();
        }
        $tQty = $purchases->sum('total_qty');
        $tSub = $purchases->sum('sub_total');
        $tPay = $purchases->sum('payable');
        $tDis = $tSub - $tPay;
        return view('backend.Reports.Purchase.datewisePrint', 
            compact('company','supplier','purchases','tQty','tSub','tPay','tDis','startDate','endDate'));
    }

    public function big_invoice(Request $request)
    {
        $company = Company::all();
        $purchases = Purchase::where('purchase_no', $request->id)
                            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                            ->select('purchases.*','suppliers.name as supplier',
                                    'suppliers.phone','suppliers.email','suppliers.address')
                            ->get();
        $purchase_dt = PurchaseItem::where('purchase_no', $request->id)->get();

        return view('backend.Reports.Purchase.bigInvoice', 
            compact('company','purchases','purchase_dt'));
    }

    public function bigInvoicePrint(Request $request)
    {
        $company = Company::all();
        $purchases = Purchase::where('purchase_no', $request->id)
                            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                            ->select('purchases.*','suppliers.name as supplier',
                                    'suppliers.phone','suppliers.email','suppliers.address')
                            ->get();
        $purchase_dt = PurchaseItem::where('purchase_no', $request->id)->get();

        return view('backend.Reports.Purchase.bigInvoicePrint', 
            compact('company','purchases','purchase_dt'));
    }

    
    public function mini_invoice(Request $request)
    {
        $company = Company::all();
        $purchases = Purchase::where('purchase_no', $request->id)
                            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                            ->select('purchases.*','suppliers.name as supplier',
                                    'suppliers.phone','suppliers.email','suppliers.address')
                            ->get();
        $purchase_dt = PurchaseItem::where('purchase_no', $request->id)->get();
        
        return view('backend.Reports.Purchase.miniInvoicePrint', 
            compact('company','purchases','purchase_dt'));
    }

}
