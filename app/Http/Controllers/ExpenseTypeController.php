<?php

namespace App\Http\Controllers;

use App\Model\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $data = ExpenseType::orderBy('id', 'DESC')->get();
        return view('backend.Accounts.expense_type', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new ExpenseType();
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = ExpenseType::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        ExpenseType::where('id',$request->id)
            ->update([
                    'name'      => $request->name,
                    'details'   => $request->details,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = ExpenseType::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
