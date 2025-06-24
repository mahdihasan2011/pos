<?php

namespace App\Http\Controllers;

use App\Model\DiscountType;
use App\Model\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $supplier = Supplier::orderBy('id', 'DESC')->get();
        $discount_type = DiscountType::orderBy('id', 'DESC')->where('ctype', '=', 'Supplier')->get();
        return view('backend.Configuration.supplier', compact('supplier','discount_type'));
    }

    public function store(Request $request)
    {
        $data           = new Supplier();
        $data->name     = $request->name;
        $data->phone    = $request->phone;
        $data->email    = $request->email;
        $data->category = $request->category;
        $data->balance  = $request->balance;
        $data->address  = $request->address;
        $data->save();
        return response()->json($data);
    }

    public function edit(Request $request, $id)
    {
        $data = Supplier::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data           = Supplier::find($request->id);
        $data->name     = $request->name;
        $data->phone    = $request->phone;
        $data->email    = $request->email;
        $data->category = $request->category;
        $data->balance  = $request->balance;
        $data->address  = $request->address;
        $data->save();
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $data = Supplier::find($request->id);
        $data->delete();
        return response()->json($data);
    }

}
