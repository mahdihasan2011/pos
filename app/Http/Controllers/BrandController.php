<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Brand::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.brand', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Brand();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Brand::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Brand::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Brand::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
