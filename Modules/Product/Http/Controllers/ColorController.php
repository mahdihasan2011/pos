<?php

namespace Modules\Product\Http\Controllers;

use App\Model\Color;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Color::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.color', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Color();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Color::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Color::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Color::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
