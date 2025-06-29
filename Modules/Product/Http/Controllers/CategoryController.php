<?php

namespace Modules\Product\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Category::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.category', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Category::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Category::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Category::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
