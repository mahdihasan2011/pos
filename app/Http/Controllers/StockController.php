<?php

namespace App\Http\Controllers;

use App\Model\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function current(Request $request)
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
                        ->get();
        $tQty = $current_st->sum('quantity');
        $tCst = $current_st->sum('cost');
        $tPrc = $current_st->sum('price');
        return view('backend.Stock.current2', compact('current_st','tQty','tCst','tPrc'));
    }

    public function edit(Request $request)
    {
        $data = Stock::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = Stock::where('id', $request->id)->first();
        if (!empty($data)) {
            Stock::where('id',$request->id)
                    ->update([
                        'quantity'  => !empty($request->quantity) ? $request->quantity : $data->quantity,
                        'cost'      => !empty($request->cost) ? $request->cost : $data->cost,
                        'price'     => !empty($request->price) ? $request->price : $data->price,
                    ]);
            return response()->json([
                'type'      => 'success',
                'message'   => 'Stock Adjusted Successfully.'
            ]);
        } else {
            return response()->json([
                'type'      => 'error',
                'message'   => 'Stock not adjusted.'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $data = Stock::find($request->id);
        $data->delete();
        return response()->json();
    }

}
