<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Purchase;
use App\Model\PurchaseItem;
use App\Model\Supplier;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function item(Request $request)
    {
        $date       = new DateTime("now");
        $data       = $date->format('ymd');
        if ($last   = Purchase::get()->last()) {
            $sl     = $last->id;
        } else {
            $sl     = 0;
        }
        $po         = 'P';
        $s          = $sl + 1 ;
        $purchase   = $po . $data . $s ;
        $purchases  = $po . $data . $sl ;
        $products   = Product::orderBy('name', 'ASC')->get();
        $suppliers  = Supplier::orderBy('id', 'DESC')->get();
        $carts      = DB::table('carts')->orderBy('id', 'DESC')->get();
        $tqty       = $carts->sum('quantity');
        $subt       = $carts->sum('total');
        return view('backend.Purchase.purchase',
            compact('purchase','products','suppliers','carts','purchases','tqty','subt'));
    }

    public function supplier_details(Request $request)
    {
        $data = Supplier::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function supplier_store(Request $request)
    {
        $data           = new Supplier();
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
        // if ($last   = DB::table('carts')->orderBy('id', 'DESC')->first()) {
        //     $sl     = $last->sl;
        //     $qty    = $last->quantity;
        //     $tl     = $last->total;
        // } else {
        //     $sl     = 0;
        //     $qty    = 0;
        //     $tl     = 0;
        // }
        // $data = array(
        //     'sl'        => $sl + 1,
        //     'name'      => $products->name,
        //     'code'      => $products->code,
        //     'quantity'  => 1,
        //     'price'     => $products->price,
        //     'total'     => $tl + $products->price,
        // );
        // $insert = DB::table('carts')->insert($data);

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
            $insert = DB::table('carts')->insert($data);
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
            // $insert = DB::table('carts')
            //             ->where('code', $pcode)
            //             ->increment('total', $total);
        }
        // $update = DB::table('carts')
        //             ->where('code', $pcode)
        //             ->update(['total' => $newCost]);
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
                'tqty'  => $tqty,
                'subt'  => $subt,
            ]);
    }

    public function item_remove(Request $request)
    {
        DB::table('carts')->where('id', $request->id)->delete();
        $tqty   = DB::table('carts')->sum('quantity');
        $subt   = DB::table('carts')->sum('total');
        return response()->json([
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
                'tqty'  => $tqty,
                'subt'  => $subt,
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
                'tqty'  => $tqty,
                'subt'  => $subt,
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
                'tqty'  => $tqty,
                'subt'  => $subt,
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
        $today = new DateTime("now");
        $data  = new Purchase();
        $data->purchase_no      = $request->purchase_no;
        $data->supplier         = $request->supplier;
        $data->date             = $today;
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
                    ->select('carts.*','products.sale_price')
                    ->get();
        if(empty($cart)) {
            return response()->json(array(
                'message' => 'Product Not Found',
            ));
        } else {
            if ($data->save()) {
                foreach ($cart as $item) {
                    DB::table('purchase_items')->insert([
                        'name' => $item->name,
                        'code' => $item->code,
                        'purchase_no' => $request->purchase_no,
                        'date' => $today,
                        'cost' => $item->price,
                        'quantity' => $item->quantity,
                        'total' => $item->total
                    ]);
                    $stdata = array(
                        'code' => $item->code,
                        'name' => $item->name,
                        'quantity' => $item->quantity,
                        'cost' => $item->price,
                        'price' => $item->sale_price,
                    );
                    $exist = DB::table('stocks')->where('code', $item->code)->first();
//                    if ($exist == null)//if doesn't exist: create
                    if (DB::table('stocks')->where('code', $item->code)->doesntExist())
                    {
                        DB::table('stocks')->insert($stdata);
                    } else //if exist: update
                    {
                        //if purchase cost is same as stock cost
                        if ($exist->cost == $item->sale_price) {
                            DB::table('stocks')
                                ->where('code', $item->code)
                                ->increment('quantity', $item->quantity);
                        } //if purchase cost is not same as stock cost
                        else {
                            $newCost = ($exist->cost + $item->sale_price) / 2;
                            DB::table('stocks')
                                ->where('code', $item->code)
                                ->increment('quantity', $item->quantity);
                            DB::table('stocks')
                                ->where('code', $item->code)
                                ->update(['cost' => $newCost]);
                        }
                    }
                }
                DB::table('carts')->truncate();
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


}
