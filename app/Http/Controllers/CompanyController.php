<?php

namespace App\Http\Controllers;

use App\Model\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { 
        $info = Company::orderBy('id', 'DESC')->get();
        return view('backend.Configuration.details', compact('info'));
    }

    public function store(Request $request)
    {
        $data = new Company();
        $data->name = $request->name;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Company::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        if ($request->hasFile('logo')) 
        {
            $logo       = $request->file('logo');
            $logoname   = uniqid().$logo->getClientOriginalName();
            $uploadPath = 'public/Logo/';
            $logo->move($uploadPath,$logoname);
            $logoUrl    = $uploadPath.$logoname; 
        }
        else {
            $data       = Company::find($request->id);
            $logoUrl    = $data->logo;
        }
        Company::where('id', $request->id)
                ->update([
                    'title'         => $request->title,
                    'name'          => $request->name,
                    'phone'         => $request->phone,
                    'email'         => $request->email,
                    'website'       => $request->website,
                    'address'       => $request->address,
                    'invoice_note'  => $request->invoice_note,
                    'logo'          => $logoUrl,
                ]);
        return redirect()->back();
    }

    
}
