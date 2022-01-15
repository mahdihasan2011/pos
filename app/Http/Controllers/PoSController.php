<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Stock;
use App\Model\Company;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PoSController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function pos(Request $request)
    {
        $date       = new DateTime("now");
        $today      = $date->format('Y-m-d');
        $data       = $date->format('ymd');
        if ($last   = Sale::get()->last()) {
            $sl     = $last->id;
        } else {
            $sl     = 0;
        }
        $po         = 'INV';
        $s          = $sl + 1 ;
        $sale       = $po . $data . $s ;
        $products   = Stock::orderBy('name', 'asc')
                            ->leftJoin('products', 'products.code', 'stocks.code')
                            ->select('stocks.*','products.image')
                            ->where('quantity','>','0')->get();
        $customers  = Customer::orderBy('id', 'DESC')->get();
        $carts      = DB::table('carts')->orderBy('id', 'DESC')->get();
        $tqty       = $carts->sum('quantity');
        $subt       = $carts->sum('total');

        return view('backend.Pos.pos_terminal',
            compact('today','sale','products','customers','carts','tqty','subt'));
    }

    public function product_search(Request $request)
    {
        if($request->ajax())
        {
            $data   = Stock::where('code', 'LIKE', '%'.$request->value.'%')->get();
            $output = '';
            if (count($data)>0)
            {
                $output = '<ul class="list-group" style="display: block; position: relative; overflow: hidden; z-index: 1">';
                foreach ($data as $row){
                    $output .= '<li class="list- group-item">'.$row->code.'</li>';
                }
                $output .= '</ul>';
            }
            else {
                $output .= '<li class="list- group-item">'.'Product Not Found.'.'</li>';
            }
            return $output;
        }
    }

    public function product_add(Request $request)
    {
        $products   = Stock::where('code', $request->code)->first();
        $pcode      = $products->code;
        $cart       = DB::table('carts')->where('code', $pcode)->first();

        if ($cart   == null) {
            $insert = DB::table('carts')
                        ->insert([
                                'name'      => $products->name,
                                'code'      => $products->code,
                                'quantity'  => 1,
                                'price'     => $products->price,
                                'total'     => $products->price
                            ]);
        } else {
            $insert = DB::table('carts')
                        ->where('code', $pcode)
                        ->increment('quantity', 1);
            $cart   = DB::table('carts')->where('code', $pcode)->first();
            $qty    = $cart->quantity;
            $price  = $cart->price;
            $total  = $price * $qty;
            $insert = DB::table('carts')
                        ->where('code', $pcode)
                        ->update(['total' => $total]);
        }
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        $carts  = DB::table('carts')->where('code', $pcode)->first();
        $id = $carts->id;
        $name = $carts->name;
        return response()->json([
                                    'carts' => $carts,
                                    'tqty'  => $tqty,
                                    'subt'  => $subt,
                                ]);
    }

    public function customer_details(Request $request)
    {
        $data = Customer::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function customer_store(Request $request)
    {
        $data           = new Customer();
        $data->name     = $request->name;
        $data->phone    = $request->phone;
        $data->email    = $request->email;
        $data->category = $request->category;
        $data->balance  = $request->balance;
        $data->address  = $request->address;
        $data->save();
        return redirect()->back();
    }

    public function item_add(Request $request)
    {
        $products   = Stock::where('id', $request->id)->first();
        $pcode      = $products->code;
        $cart       = DB::table('carts')->where('code', $pcode)->first();

        if ($cart   == null) {
            $insert = DB::table('carts')
                        ->insert([
                                'name'      => $products->name,
                                'code'      => $products->code,
                                'quantity'  => 1,
                                'price'     => $products->price,
                                'total'     => $products->price
                            ]);
        } else {
            $insert = DB::table('carts')
                        ->where('code', $pcode)
                        ->increment('quantity', 1);
            $cart   = DB::table('carts')->where('code', $pcode)->first();
            $qty    = $cart->quantity;
            $price  = $cart->price;
            $total  = $price * $qty;
            $insert = DB::table('carts')
                        ->where('code', $pcode)
                        ->update(['total' => $total]);
        }
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        $carts  = DB::table('carts')->where('code', $pcode)->first();
        $id = $carts->id;
        $name = $carts->name;
        return response()->json([
                                    'carts' => $carts,
                                    'tqty'  => $tqty,
                                    'subt'  => $subt,
                                ]);
    }

    public function item_delete(Request $request)
    {
        DB::table('carts')->where('id', $request->id)->delete();
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
            'tqty'      => $tqty,
            'subt'      => $subt,
        ]);
    }

    public function item_quantity(Request $request)
    {
        $update = DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['quantity' => $request->qty]);
        $cart   = DB::table('carts')->where('code', $request->id)->first();
        $price  = $cart->price;
        $qty    = $cart->quantity;
        $total  = $price * $qty;
        $update = DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['total' => $total]);
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                    'tqty'      => $tqty,
                    'subt'      => $subt,
                ]);
    }

    public function item_price(Request $request)
    {
        $cart   = DB::table('carts')->where('code', $request->id)->first();
        $qty    = $cart->quantity;
        $price  = $request->price;
        $total  = $price * $qty;
        $update = DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['price' => $price, 'total' => $total]);
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                    'tqty'      => $tqty,
                    'subt'      => $subt,
                ]);
    }

    public function cart_clear(Request $request)
    {
        DB::table('carts')->truncate();
        return redirect()->back();
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
            $payable    = $subt - $d;
        } else {
            $payable    = $subt - $disc;
        }
        return response()->json([
                'payable'   => $payable,
                'tqty'      => $tqty,
                'subt'      => $subt,
                'disc'      => $disc,
                'paid'      => $paid,
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
            $payable    = $subt - $d;
        } else {
            $payable    = $subt - $disc;
        }
        return response()->json([
                'payable'   => $payable,
                'tqty'      => $tqty,
                'subt'      => $subt,
                'disc'      => $disc,
                'paid'      => $paid,
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
            ));
    }

    public function item_store(Request $request)
    {
        $date       = new DateTime("now");
        $data       = $date->format('ymd');
        if ($last   = Sale::get()->last()) {
            $sl     = $last->id;
        } else {
            $sl     = 0;
        }
        $po         = 'INV';
        $s          = $sl + 1 ;
        $sale       = $po . $data . $s ;
        if ($request->customer != 'Cash') {
            $cust = Customer::where('id', $request->customer)->first();
            $cust->balance  = $cust->balance + $request->due;
            $cust->save();
        }
        $data                   = new Sale();
        $data->sale_no          = $sale;
        $data->customer         = $request->customer;
        $data->date             = $request->sale_date;
        $data->amount           = $request->due_amount;
        $data->total_qty        = $request->total_qty;
        $data->sub_total        = $request->sub_total;
        $data->discount         = $request->discount;
        $data->disc_type        = $request->disc_type;
        $data->payable          = $request->payable;
        $data->paid             = $request->paid;
        $data->return           = $request->return;
        $data->due              = $request->due;
        $data->payment_type     = $request->payment_type;
        $data->payment_number   = $request->payment_number;
        $data->save();

        $cart = DB::table('carts')->get();
        foreach ($cart as $item)
        {
            $insert = DB::table('sale_items')
                        ->insert([
                                'name'      => $item->name,
                                'code'      => $item->code,
                                'sale_no'   => $sale,
                                'date'      => $request->sale_date,
                                'price'     => $item->price,
                                'quantity'  => $item->quantity,
                                'total'     => $item->total
                            ]);
            $update = DB::table('stocks')
                        ->where('code', $item->code)
                        ->decrement('quantity', $item->quantity);
        }
        DB::table('carts')->truncate();
        Session::put('invoice', $data->sale_no);
        // $invoice = $data->sale_no;
        // return response()->json($invoice);
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
