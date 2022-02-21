<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Setting;
use App\Model\Stock;
use App\Model\Company;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PoSController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function pos(Request $request)
    {
        $date       = new DateTime("now");
        $today      = $date->format('Y-m-d');
        $last_id    = Sale::get()->last() ? Sale::get()->last()->id : 0;
        $initial    = Setting::first() ? Setting::first()->sale_code_initial : "";
        $serial     = $last_id + 1;
        $invoice_no = $initial . $date->format('ymd') . $serial;
        $categries  = Category::all();
        $products   = Stock::orderBy('products.name', 'asc')
                            ->join('products', 'products.id', 'stocks.product_id')
                            ->select('stocks.*','products.image','products.category','products.code','products.name')
                            ->where('stocks.quantity','>','0')
                            ->get();
        $users      = Customer::orderBy('id', 'DESC')->get();
        $carts      = DB::table('carts')->orderBy('id', 'DESC')->get();
        $tqty       = $carts->sum('quantity');
        $subt       = $carts->sum('total');
        $terminal   = Setting::first()->sale_terminal ? Setting::first()->sale_terminal : "";
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        if ($terminal == 2){
            $view = 'backend.Pos.terminal2';
        } elseif ($terminal == 3) {
            $view = 'backend.Pos.terminal3';
        } elseif ($terminal == 1) {
            $view = 'backend.Pos.sale';
        } else {
            $view = 'backend.Pos.sale';
        }
        Session::forget('sale_no');
        return view($view, compact('today','invoice_no','categries','products','users','carts','tqty','subt','vat'));
    }

    public function product_search(Request $request)
    {
        if ($request->ajax()) {
            $data = Stock::join('products', 'products.id', 'stocks.product_id')
                ->select('stocks.*','products.image','products.category','products.code','products.name')
                ->where('stocks.quantity','>','0')
                ->where('products.code', 'LIKE', '%'.$request->value.'%')
                ->get();
            if (count($data) > 0) {
                $output = '<ul class="list-group p-1" style="display: block; position: absolute; background-color: #FFFFFF;">';
                foreach ($data as $row){
                    $output .= '<li class="list-group-item">'.$row->code.'</li>';
                }
                $output .= '</ul>';
            } else {
                $output = '';
            }
            return $output;
        }
    }

    public function product_add(Request $request)
    {
        $products   = Stock::join('products', 'products.id', 'stocks.product_id')
                        ->select('stocks.*','products.image','products.category','products.code','products.name')
                        ->where('products.code', $request->code)
                        ->first();
        $pcode      = $products->code;
        $cart       = DB::table('carts')->where('code', $pcode)->first();
        if ($cart   == null) {
            DB::table('carts')
                ->insert([
                        'name'      => $products->name,
                        'code'      => $products->code,
                        'quantity'  => 1,
                        'price'     => $products->price,
                        'total'     => $products->price
                    ]);
        } else {
            DB::table('carts')
                ->where('code', $pcode)
                ->increment('quantity', 1);
            $cart   = DB::table('carts')->where('code', $pcode)->first();
            $qty    = $cart->quantity;
            $price  = $cart->price;
            $total  = $price * $qty;
            DB::table('carts')
                ->where('code', $pcode)
                ->update(['total' => $total]);
        }
        $tqty       = DB::table('carts')->sum('quantity');
        $subt       = DB::table('carts')->sum('total');
        $carts      = DB::table('carts')->where('code', $pcode)->first();
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt    = ($subt * $vat) / 100;
        $payable    = $subt + $vatamnt;
        return response()->json([
            'carts'     => $carts,
            'tqty'      => $tqty,
            'subt'      => $subt,
            'payable'   => $payable,
            'vat'       => $vatamnt,
            'message'   => "Product added to cart Successfully.",
        ]);
    }

    public function customer_details(Request $request)
    {
        $data = Customer::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function customer_store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);
        $data = Customer::create([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'category'  => $request->category,
            'balance'   => $request->balance,
            'address'   => $request->address
        ]);
        if ($data) {
            return response()->json(array(
                'info'  =>  $data,
                'message'  =>  "Customer Information Saved Successfully",
            ));
        } else {
            return response()->json(array(
                'message'  =>  "Customer Information Not Saved",
            ));
        }
    }

    public function item_add(Request $request)
    {
        $products   = Stock::join('products', 'products.id', 'stocks.product_id')
                            ->select('stocks.*','products.image','products.category','products.code','products.name')
                            ->where('stocks.id', $request->id)
                            ->first();
        $pcode      = $products->code;
        $cart       = DB::table('carts')->where('code', $pcode)->first();

        if ($cart === null) {
            DB::table('carts')
                ->insert([
                        'name'      => $products->name,
                        'code'      => $products->code,
                        'quantity'  => 1,
                        'price'     => $products->price,
                        'total'     => $products->price
                    ]);
        } else {
            DB::table('carts')
                    ->where('code', $pcode)
                    ->increment('quantity', 1);
            $cart   = DB::table('carts')->where('code', $pcode)->first();
            $qty    = $cart->quantity;
            $price  = $cart->price;
            $total  = $price * $qty;
            DB::table('carts')
                    ->where('code', $pcode)
                    ->update(['total' => $total]);
        }
        $tqty       = DB::table('carts')->sum('quantity');
        $subt       = DB::table('carts')->sum('total');
        $carts      = DB::table('carts')->where('code', $pcode)->first();
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt    = ($subt * $vat) / 100;
        $payable    = $subt + $vatamnt;
        return response()->json([
            'carts'     => $carts,
            'tqty'      => $tqty,
            'subt'      => $subt,
            'payable'   => $payable,
            'vat'       => $vatamnt,
            'message'   => "Product added to cart Successfully.",
        ]);
    }

    public function item_remove(Request $request)
    {
        DB::table('carts')->where('id', $request->id)->delete();
        $tqty       = DB::table('carts')->sum('quantity');
        $subt       = DB::table('carts')->sum('total');
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt    = ($subt * $vat) / 100;
        $payable    = $subt + $vatamnt;
        return response()->json([
            'tqty'      => $tqty,
            'subt'      => $subt,
            'payable'   => $payable,
            'vat'       => $vatamnt,
            'message'   => "Product removed from cart",
        ]);
    }

    public function item_quantity(Request $request)
    {
        DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['quantity' => $request->qty]);
        $cart       = DB::table('carts')->where('code', $request->id)->first();
        $price      = $cart->price;
        $qty        = $cart->quantity;
        $total      = $price * $qty;
        DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['total' => $total]);
        $tqty       = DB::table('carts')->sum('quantity');
        $subt       = DB::table('carts')->sum('total');
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt    = ($subt * $vat) / 100;
        $payable    = $subt + $vatamnt;
        return response()->json([
            'tqty'      => $tqty,
            'subt'      => $subt,
            'payable'   => $payable,
            'vat'       => $vatamnt,
            'message'   => "Product quantity updated Successfully.",
        ]);
    }

    public function item_price(Request $request)
    {
        $cart       = DB::table('carts')->where('code', $request->id)->first();
        $qty        = $cart->quantity;
        $price      = $request->price;
        $total      = $price * $qty;
        DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['price' => $price, 'total' => $total]);
        $tqty       = DB::table('carts')->sum('quantity');
        $subt       = DB::table('carts')->sum('total');
        $vat        = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt    = ($subt * $vat) / 100;
        $payable    = $subt + $vatamnt;
        return response()->json([
            'tqty'      => $tqty,
            'subt'      => $subt,
            'payable'   => $payable,
            'vat'       => $vatamnt,
            'message'   => "Product price updated Successfully.",
        ]);
    }

    public function cart_clear(Request $request)
    {
        DB::table('carts')->truncate();
        return response()->json(array(
            'message'   => "All product removed from cart successfully",
        ));
    }

    public function discount(Request $request)
    {
        $tqty           = DB::table('carts')->sum('quantity');
        $subt           = DB::table('carts')->sum('total');
        $disc           = $request->disc;
        $disc_type      = $request->disc_type;
        $paid           = $request->paid;
        if ($disc_type  == '1') {
            $d          = ($subt * $disc) / 100;
            $payabl     = $subt - $d;
        } else {
            $payabl     = $subt - $disc;
        }
        $vat = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt        = ($payabl * $vat) / 100;
        $payable        = $payabl + $vatamnt;
        return response()->json([
                'vat'       => $vatamnt,
                'tqty'      => $tqty,
                'subt'      => $subt,
                'payable'   => $payable,
                'disc'      => $disc,
                'paid'      => $paid,
                'message'   => "Discount calculated successfully",
            ]);
    }

    public function discount_type(Request $request)
    {
        $tqty           = DB::table('carts')->sum('quantity');
        $subt           = DB::table('carts')->sum('total');
        $paid           = $request->paid;
        $disc           = $request->disc;
        $disc_type      = $request->disc_type;
        if ($disc_type  == '1') {
            $d          = ($subt * $disc) / 100;
            $payabl     = $subt - $d;
        } else {
            $payabl     = $subt - $disc;
        }
        $vat            = Setting::first()->vat_percentage ? Setting::first()->vat_percentage : 10;
        $vatamnt        = ($payabl * $vat) / 100;
        $payable        = $payabl + $vatamnt;
        return response()->json([
                'vat'       => $vatamnt,
                'tqty'      => $tqty,
                'subt'      => $subt,
                'payable'   => $payable,
                'disc'      => $disc,
                'paid'      => $paid,
                'message'   => "Discount calculated successfully",
            ]);
    }

    public function paid_amount(Request $request)
    {
        $paid   = $request->paid;
        $pay    = $request->pay;
        $cal    = $paid - $pay;
        if ($cal > 0) {
            $return = $cal;
            $due    = 0;
        } else {
            $due    = $pay - $paid;
            $return = 0;
        }
        return response()->json(array(
                'due'       => $due,
                'return'    => $return,
                'message'   => "Paid amount calculated successfully",
        ));
    }

    public function item_store(Request $request)
    {
        $date       = new DateTime("now");
        $today      = $date->format('Y-m-d');
        $last_id    = Sale::get()->last() ? Sale::get()->last()->id : 0;
        $initial    = Setting::first() ? Setting::first()->sale_code_initial : "";
        $serial     = $last_id + 1;
        $invoice_no = $initial . $date->format('ymd') . $serial;
        if (!empty($request->customer) && $request->customer != 'Cash') {
            $cust = Customer::where('id', $request->customer)->first();
            if (!empty($cust)) {
                $cust->balance = $cust->balance + $request->due;
                $cust->save();
            }
        }
        // dd($request->all());
        $data                   = new Sale();
        $data->sale_no          = $request->invoice_no ? $request->invoice_no : $invoice_no;
        $data->customer         = !empty($request->customer) ? $request->customer : 'Cash';
        $data->date             = $request->date ? $request->date : $today;
        $data->amount           = $request->due_amount;
        $data->total_qty        = $request->total_qty;
        $data->sub_total        = $request->sub_total;
        $data->discount         = $request->discount;
        $data->disc_type        = $request->disc_type;
        $data->vat              = $request->vat;
        $data->payable          = $request->payable;
        $data->paid             = $request->paid;
        $data->return           = $request->return;
        $data->due              = $request->due;
        $data->payment_type     = $request->payment_type;
        $data->payment_number   = $request->payment_number;
        if($data->save()) {
            $cart = DB::table('carts')
                    ->leftJoin('products','carts.code','products.code')
                    ->select('carts.*','products.sale_price','products.id as product_id')
                    ->get();
            foreach ($cart as $item) {
                DB::table('sale_items')
                    ->insert([
                            'name'      => $item->name,
                            'product_id'=> $item->product_id,
                            'sale_no'   => $request->invoice_no ? $request->invoice_no : $invoice_no,
                            'date'      => $request->date ? $request->date : $today,
                            'price'     => $item->price,
                            'quantity'  => $item->quantity,
                            'total'     => $item->total
                        ]);
                DB::table('stocks')
                    ->where('product_id', $item->product_id)
                    ->decrement('quantity', $item->quantity);
            }
            DB::table('carts')->truncate();
            Session::put('sale_no', $data->sale_no);
            return response()->json(array(
                'message' => 'Product Sold Successfully',
            ));
        } else {
            return response()->json(array(
                'message' => 'Product Not Sold',
            ));
        }
    }

    public function mini_invoice(Request $request)
    {
        $company    = Company::first();
        $sale       = Sale::where('sale_no', $request->id)
                            ->leftJoin('customers','sales.customer','customers.id')
                            ->select('sales.*','customers.name as customer','customers.phone','customers.email','customers.address')
                            ->first();
        $sales_dt   = SaleItem::where('sale_items.sale_no', $request->id)
                            ->leftJoin('products', 'sale_items.product_id', 'products.id')
                            ->select('sale_items.*','products.code')
                            ->get();

        return view('backend.Reports.Sale.miniInvoicePrint', compact('company','sale','sales_dt'));
    }

}
