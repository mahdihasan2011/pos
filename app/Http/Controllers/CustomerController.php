<?php

namespace App\Http\Controllers;

use App\Model\DiscountType;
use Illuminate\Http\Request;
use App\Model\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customer = Customer::orderBy('id', 'DESC')->get();
        $discount_type = DiscountType::orderBy('id', 'DESC')->where('ctype', '=', 'Customer')->get();
        return view('backend.Configuration.customer', compact('customer','discount_type'));
    }

    // public function store(Request $request)
    // {
    //     $data = Customer::updateOrCreate(
    //         ['id' => $request->id],
    //         // ['name' => $request->name],
    //         // ['phone' => $request->phone],
    //         // ['email' => $request->email],
    //         // ['category' => $request->category],
    //         // ['balance' => $request->balance],
    //         // ['address' => $request->address]
    //         [
    //             'name'      => $request->name,
    //             'phone'     => $request->phone,
    //             'email'     => $request->email,
    //             'category'  => $request->category,
    //             'balance'   => $request->balance,
    //             'address'   => $request->address
    //         ]
    //     );
    //     return response()->json($data);
    // }

    public function store(Request $request)
    {
        $data           = new Customer();
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
        $data = Customer::where('id', $id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data           = Customer::find($request->id);
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
        $data = Customer::find($request->id);
        $data->delete();
        return response()->json($data);
        // return redirect()->back()->with('danger','Customer Deleted Successfully');
    }
}
