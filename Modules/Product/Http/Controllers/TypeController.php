<?php

namespace Modules\Product\Http\Controllers;

use App\Model\Type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Type::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.type', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Type();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Type::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Type::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Type::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
