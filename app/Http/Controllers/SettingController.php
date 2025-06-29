<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;

class SettingController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:admin', ['only' => ['index', 'store', 'edit', 'update']]);
    }

    public function index(Request $request)
    {
        $data = Setting::first();
        return view('backend.Settings.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'purchase_code_initial' => 'required',
            'sale_code_initial' => 'required',
            //             'item_code_initial'        => 'required',
            'purchase_terminal' => 'required',
            'sale_terminal' => 'required',
            'menu_position' => 'required',
            'brand_logo_variant' => 'required',
            'navbar_variant' => 'required',
            'sidebar_variant' => 'required',
            'vat_percentage' => 'required|integer',
        ]);
        $data = new Setting();
        $data->purchase_code_initial = $request->purchase_code_initial;
        $data->sale_code_initial = $request->sale_code_initial;
        $data->item_code_initial = $request->item_code_initial;
        $data->purchase_terminal = $request->purchase_terminal;
        $data->sale_terminal = $request->sale_terminal;
        $data->menu_position = $request->menu_position;
        $data->brand_logo_variant = $request->brand_logo_variant;
        $data->navbar_variant = $request->navbar_variant;
        $data->sidebar_variant = $request->sidebar_variant;
        $data->flat_sidebar = $request->flat_sidebar;
        $data->sidebar_child_menu = $request->sidebar_child_menu;
        $data->vat_percentage = $request->vat_percentage;
        $data->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Setting::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'purchase_code_initial' => 'required',
            'sale_code_initial' => 'required',
            //            'item_code_initial'        => 'required',
            'purchase_terminal' => 'required',
            'sale_terminal' => 'required',
            'menu_position' => 'required',
            'brand_logo_variant' => 'required',
            'navbar_variant' => 'required',
            'sidebar_variant' => 'required',
            'vat_percentage' => 'required|integer',
        ]);
        Setting::where('id', $request->id)
            ->update([
                    'purchase_code_initial' => $request->purchase_code_initial,
                    'sale_code_initial' => $request->sale_code_initial,
                    'item_code_initial' => $request->item_code_initial,
                    'purchase_terminal' => $request->purchase_terminal,
                    'sale_terminal' => $request->sale_terminal,
                    'menu_position' => $request->menu_position,
                    'brand_logo_variant' => $request->brand_logo_variant,
                    'navbar_variant' => $request->navbar_variant,
                    'sidebar_variant' => $request->sidebar_variant,
                    'flat_sidebar' => $request->flat_sidebar,
                    'sidebar_child_menu' => $request->sidebar_child_menu,
                    'vat_percentage' => $request->vat_percentage,
                ]);
        return redirect()->back();
    }

}
