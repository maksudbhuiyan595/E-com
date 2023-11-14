<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("backend.layouts.products.index", compact("products"));
    }
    public function create()
    {   
        $categories=Category::all();
        $brands=Brand::all();
        $subcategories=subCategory::all();
        return view("backend.layouts.products.create",compact("categories","brands","subcategories"));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sub_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           

        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->errors()->first());
            return redirect()->back();
        
        }
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName=date('Ymdhsi'.'.'.$image->getClientOriginalExtension());
            $image->storeAs('/products',$fileName);
            // dd($fileName);
        }

        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'brand_id'=>$request->brand_id,
            'image'=>$fileName

        ]);
        
        toastr()->success('successfully Product created.');
        return redirect()->route('product.index');
        
    }
    public function edit($id)
    {   $brands= Brand::all();
        $categories= Category::all();
        $subcategories= subCategory::all();
        $product = Product::findOrFail($id);
        return view('backend.layouts.products.edit', compact('product','categories','brands','subcategories'));
    }
    public function update(Request $request, $id)
    {
         // dd($request->all());
         $product=Product::find($id);
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sub_category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->errors()->first());
            return redirect()->back();
        
        }
        $fileName=$product->image;
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $fileName=date('Ymdhsi'.'.'.$image->getClientOriginalExtension());
            $image->storeAs('/products',$fileName);
            // dd($fileName);
        }
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'brand_id'=>$request->brand_id,
            'image'=>$fileName

        ]);
        toastr()->success('successfully product update.');
        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->success('successfully product delete.');
        return redirect()->route('product.index');
    }
}
