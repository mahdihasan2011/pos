<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DiscountType;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;


class DiscountTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = DiscountType::orderBy('id', 'DESC')->get();
        return view('account::discount_type', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new DiscountType();
        $data->name = $request->name;
        $data->ctype = $request->ctype;
        $data->amount = $request->amount;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = DiscountType::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        DiscountType::where('id',$request->id)
            ->update([
                'name'     => $request->name,
                'ctype'    => $request->ctype,
                'amount'   => $request->amount,
            ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = DiscountType::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
