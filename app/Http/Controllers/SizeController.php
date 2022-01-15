<?php

namespace App\Http\Controllers;

use App\Model\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Size::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.size', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Size();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Size::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Size::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Size::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
