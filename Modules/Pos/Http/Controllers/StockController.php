<?php

namespace Modules\Pos\Http\Controllers;

use App\Model\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

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
                        ->select('stocks.*','products.image','categories.name as category','products.name as product','products.code',/* DB::raw('SUM(purchase_items.quantity) as purchase_qty') */)
                        ->where('stocks.status', '=', 1)
                        ->get();
        $tQty = $current_st->sum('quantity');
        $tCst = $current_st->sum('cost');
        $tPrc = $current_st->sum('price');
        return view('pos::stock', compact('current_st','tQty','tCst','tPrc'));
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
        if(Stock::where('id', $request->id)->update([ 'status' => 0 ])) {
            return response()->json([
                'type'      => 'info',
                'message'   => 'Product removed form stock successfully.'
            ]);
        } else {
            return response()->json([
                'type'      => 'error',
                'message'   => 'Product not found'
            ]);
        }
    }

}
