<?php

namespace Modules\Account\Http\Controllers;

use App\Model\Expense;
use App\Model\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $date = new DateTime("now");
        $today = $date->format('Y-m-d');
        $data = Expense::orderBy('id', 'DESC')
                    ->leftJoin('expense_types','expenses.type','expense_types.id')
                    ->select('expenses.*','expense_types.name as expense_type')
                    ->get();
        $expense_types = ExpenseType::orderBy('id', 'DESC')->get();
        return view('account::expense', compact('data','expense_types','today'));
    }

    public function store(Request $request)
    {
        $date = new DateTime("now");
        $today = $date->format('Y-m-d');
        $data = new Expense();
        $data->date = !empty($request->date) ? $request->date : $today;
        $data->type = $request->type;
        $data->amount = $request->amount;
        $data->comment = $request->comment;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Expense::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $date = new DateTime("now");
        $today = $date->format('Y-m-d');
        Expense::where('id',$request->id)
            ->update([
                    'date'     => !empty($request->date) ? $request->date : $today,
                    'type'     => $request->type,
                    'amount'   => $request->amount,
                    'comment'  => $request->comment,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Expense::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
