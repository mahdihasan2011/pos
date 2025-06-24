<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Product;
use App\Model\Purchase;
use App\Model\PurchaseItem;
use App\Model\Setting;
use App\Model\Supplier;
use App\Model\DiscountType;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $date       = new DateTime("now");
        $today      = $date->format('Y-m-d');
        $last_id    = Purchase::get()->last() ? Purchase::get()->last()->id : 0;
        $initial    = Setting::first() ? Setting::first()->purchase_code_initial : "";
        $serial     = $last_id + 1;
        $invoice_no = $initial . $date->format('ymd') . $serial;
        $products   = Product::orderBy('name', 'ASC')->get();
        $users      = Supplier::orderBy('id', 'DESC')->get();
        $carts      = DB::table('carts')->orderBy('id', 'DESC')->get();
        $tQty       = $carts->sum('quantity');
        $subTotal   = $carts->sum('total');
        $title      = "Purchase Terminal";
        $discount_type = DiscountType::orderBy('id', 'DESC')->where('ctype', '=', 'Supplier')->get();
        Session::forget('purchase_no');
        return view('backend.Pos.purchase',
            compact('invoice_no','today','products','users','carts','tQty','subTotal','title','discount_type'));
    }

    public function supplier_store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);
        $data = Supplier::create([
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
                'message'  =>  "Supplier Information Saved Successfully",
            ));
        } else {
            return response()->json(array(
                'message'  =>  "Supplier Not Saved",
            ));
        }
    }

    public function item_add(Request $request)
    {
        $products   = Product::where('id', $request->id)->first();
        $pcode      = $products->code;
        $cart       = DB::table('carts')->where('code', $pcode)->first();
        if ($cart   == null) {
            $data   = array(
                'name'      => $products->name,
                'code'      => $products->code,
                'quantity'  => 1,
                'price'     => $products->purchase_price,
                'total'     => $products->purchase_price,
            );
            DB::table('carts')->insert($data);
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
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                'tqty'      => $tqty,
                'subt'      => $subt,
                'message'   => "Product added to cart Successfully.",
            ]);
    }

    public function item_remove(Request $request)
    {
        DB::table('carts')->where('id', $request->id)->delete();
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                'tqty'      => $tqty,
                'subt'      => $subt,
                'message'   => "Product removed from cart",
            ]);
    }

    public function item_quantity(Request $request)
    {
        DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['quantity' => $request->qty]);
        $cart   = DB::table('carts')->where('code', $request->id)->first();
        $price  = $cart->price;
        $qty    = $cart->quantity;
        $total  = $price * $qty;
        DB::table('carts')
                    ->where('code', $request->id)
                    ->update(['total' => $total]);
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                'tqty'      => $tqty,
                'subt'      => $subt,
                'message'   => "Product quantity updated Successfully.",
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
                'message'   =>  "Product Price Updated Successfully",
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
                'message'   => "Discount calculated successfully",
            ]);
    }

    public function discount_type(Request $request)
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
        $last_id    = Purchase::get()->last() ? Purchase::get()->last()->id : 0;
        $initial    = Setting::first() ? Setting::first()->purchase_code_initial : "";
        $serial     = $last_id + 1;
        $invoice_no = $initial . $date->format('ymd') . $serial;
        $data                   = new Purchase();
        $data->purchase_no      = $invoice_no;
        $data->supplier         = !empty($request->supplier) ? $request->supplier : 'Cash';
        $data->date             = $request->date ? $request->date : $today;
        $data->amount           = $request->amount;
        $data->total_qty        = $request->total_qty;
        $data->sub_total        = $request->sub_total;
        $data->discount         = $request->discount;
        $data->disc_type        = $request->disc_type;
        $data->payable          = $request->payable;
        $data->paid             = $request->paid;
        $data->return           = $request->return;
        $data->due              = $request->due;
        $data->payment_type     = $request->payment_type;
        // if($request->due != '0')
        // {
        //     $data               = new Payment();
        //     $data->date         = $request->date;
        //     $data->supplier     = $request->supplier;
        //     $data->purchase_no  = $request->purchase_no;
        //     $data->paid         = $request->paid;
        //     $data->due          = $request->due;
        //     $data->amount       = '0';
        //     $data->shop         = Auth::user()->id;
        //     $data->user         = Auth::user()->id;
        //     $data->save();
        // }
        $cart = DB::table('carts')
                    ->leftJoin('products','carts.code','products.code')
                    ->select('carts.*','products.sale_price','products.id as product_id')
                    ->get();
        if(empty($cart)) {
            return response()->json(array(
                'message' => 'Product Not Found',
            ));
        } else {
            if ($data->save()) {
                foreach ($cart as $item) {
                    DB::table('purchase_items')->insert([
                        'name'          => $item->name,
                        'product_id'    => $item->product_id,
                        'purchase_no'   => $invoice_no,
                        'date'          => $request->date ? $request->date : $today,
                        'cost'          => $item->price,
                        'quantity'      => $item->quantity,
                        'total'         => $item->total
                    ]);
                    $stdata = array(
                        'product_id'    => $item->product_id,
                        'quantity'      => $item->quantity,
                        'cost'          => $item->price,
                        'price'         => $item->sale_price,
                        'status'        => 1,
                    );
                    $exist = DB::table('stocks')->where('product_id', $item->product_id)->first();
//                    if ($exist == null)//if doesn't exist: create
                    if (DB::table('stocks')->where('product_id', $item->product_id)->doesntExist())
                    {
                        DB::table('stocks')->insert($stdata);
                    } else //if exist: update
                    {
                        //if purchase cost is same as stock cost
                        if ($exist->cost == $item->sale_price) {
                            DB::table('stocks')
                                ->where('product_id', $item->product_id)
                                ->increment('quantity', $item->quantity);
                        } //if purchase cost is not same as stock cost
                        else {
//                            $newCost = ($exist->cost + $item->sale_price) / 2;
                            $newCost = (($exist->cost * $exist->quantity) + ($item->sale_price * $item->quantity)) / ($exist->quantity * $item->quantity);
                            DB::table('stocks')
                                ->where('product_id', $item->product_id)
                                ->increment('quantity', $item->quantity);
                            DB::table('stocks')
                                ->where('product_id', $item->product_id)
                                ->update(['cost' => $newCost]);
                        }
                    }
                }
                DB::table('carts')->truncate();
                Session::put('purchase_no', $data->purchase_no);
                return response()->json(array(
                    'message' => 'Product Purchase Successful',
                ));
            } else {
                return response()->json(array(
                    'message' => 'Product Purchase Error',
                ));
            }
        }
    }

    public function mini_invoice(Request $request)
    {
        $company    = Company::first();
        $purchase   = Purchase::where('purchase_no', $request->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplier','suppliers.phone','suppliers.email','suppliers.address')
                        ->first();
        $purchase_dt   = PurchaseItem::where('purchase_no', $request->id)
                        ->leftJoin('products', 'purchase_items.product_id', 'products.id')
                        ->select('purchase_items.*','products.code')
                        ->get();
        return view('backend.Reports.Purchase.miniInvoicePrint', compact('company','purchase','purchase_dt'));
    }

}
