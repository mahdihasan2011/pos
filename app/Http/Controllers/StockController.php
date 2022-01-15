<?php

namespace App\Http\Controllers;

use App\Model\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function current(Request $request)
    { 
        $current_st = Stock::orderBy('id', 'DESC')->get();
        $tQty = $current_st->sum('quantity');
        $tCst = $current_st->sum('cost');
        $tPrc = $current_st->sum('price');
        return view('backend.Stock.current', compact('current_st','tQty','tCst','tPrc'));
    }

}
