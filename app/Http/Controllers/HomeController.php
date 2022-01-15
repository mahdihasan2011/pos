<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Purchase;
use App\Model\Sale;
use App\Model\SaleItem;
use App\Model\Stock;
use App\Model\Supplier;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // dd(auth()->user()->role);
        return redirect('/dashboard');
    }
}
