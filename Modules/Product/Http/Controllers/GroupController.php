<?php

namespace Modules\Product\Http\Controllers;

use App\Model\Group;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = Group::orderBy('id', 'DESC')->get();
        return view('backend.Product.Setup.group', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Group();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Group::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Group::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Group::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
