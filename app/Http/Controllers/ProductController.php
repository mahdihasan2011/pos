<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Color;
use App\Model\Group;
use App\Model\Product;
use App\Model\Size;
use App\Model\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $category   = Category::orderBy('id', 'DESC')->get();
        $brand      = Brand::orderBy('id', 'DESC')->get();
        $color      = Color::orderBy('id', 'DESC')->get();
        $size       = Size::orderBy('id', 'DESC')->get();
        $product    = Product::orderBy('id', 'DESC')
                            ->leftJoin('categories','products.category','categories.id')
                            ->leftJoin('brands','products.brand','brands.id')
                            ->leftJoin('colors','products.color','colors.id')
                            ->leftJoin('sizes','products.size','sizes.id')
                            ->select('products.*','categories.name as category','brands.name as brand','colors.name as color','sizes.name as size')
                            ->get();
        return view('backend.Product.products',
            compact('category','product','brand','color','size'));
    }

    public function entry(Request $request)
    {
        if ($last   = Product::get()->last()) {
            $sl     = $last->id;
        } else {
            $sl     = 0;
        }
        $pid        = $sl + 1 ;
        $category   = Category::orderBy('id', 'DESC')->get();
        $brand      = Brand::orderBy('id', 'DESC')->get();
        $color      = Color::orderBy('id', 'DESC')->get();
        $size       = Size::orderBy('id', 'DESC')->get();
        return view('backend.Product.product_entry',
            compact('category','brand','color','size','pid'));
    }

    public function store(Request $request)
    {
        $request->validate([
                            'name'    =>  'required',
                            'category'    =>  'required',
                        ]);
        if ($request->hasFile('image'))
        {
            $image      = $request->file('image');
            $imagename  = uniqid().$image->getClientOriginalName();
            $uploadPath = 'public/product/';
            $image->move($uploadPath,$imagename);
            $imageUrl   = $uploadPath.$imagename;
        }
        else {
            $imageUrl = null;
        }
//        $data           = new Product();
//        $data->name     = $request->name;
//        $data->code     = $request->code;
//        $data->category = $request->category;
//        $data->brand    = $request->brand;
//        $data->color    = $request->color;
//        $data->size     = $request->size;
//        $data->purchase_price     = $request->purchase_price;
//        $data->cost     = $request->cost;
//        $data->profit   = $request->profit;
//        $data->sale_price    = $request->sale_price;
//        $data->image    = $imageUrl;
//        $data->save();
        Product::create([
            'name'              => $request->name,
            'code'              => $request->code,
            'category'          => $request->category,
            'brand'             => $request->brand,
            'color'             => $request->color,
            'size'              => $request->size,
            'purchase_price'    => !empty($request->purchase_price) ? $request->purchase_price : 0,
            'cost'              => !empty($request->cost) ? $request->cost : 0,
            'profit'            => !empty($request->profit) ? $request->profit : 0,
            'sale_price'        => !empty($request->sale_price) ? $request->sale_price : 0,
            'image'             => $imageUrl,
        ]);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = Product::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = Product::find($request->id);
        if ($request->hasFile('image'))
        {
            $image      = $request->file('image');
            $imagename  = uniqid().$image->getClientOriginalName();
            $uploadPath = 'public/product/';
            $image->move($uploadPath,$imagename);
            $imageUrl   = $uploadPath.$imagename;
        } else {
            $imageUrl = $data->image;
        }
        Product::where('id',$request->id)
                ->update([
                    'name'              => $request->name,
                    'code'              => $request->code,
                    'category'          => $request->category,
                    'brand'             => $request->brand,
                    'color'             => $request->color,
                    'size'              => $request->size,
                    'purchase_price'    => !empty($request->purchase_price) ? $request->purchase_price : $data->purchase_price,
                    'cost'              => !empty($request->cost) ? $request->cost : $data->cost,
                    'profit'            => !empty($request->profit) ? $request->profit : $data->profit,
                    'sale_price'        => !empty($request->sale_price) ? $request->sale_price : $data->sale_price,
                    'image'             => $imageUrl,
                ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $data = Product::find($request->id);
        $data->delete();
        return redirect()->back();
    }

}
