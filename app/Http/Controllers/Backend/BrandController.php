<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    
    public function index()
    {
        $brands = Brand::all();
        return view("backend.layouts.brands.index", compact("brands"));
    }
    public function create()
    {
        return view("backend.layouts.brands.create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->errors()->first());
            return redirect()->back();
        }
        Brand::create([
            'name'=> $request->name,
        ]);
        toastr()->success('successfully Brand created.');
        return redirect()->route('brand.index');
        
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.layouts.brands.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->errors()->first());
            return redirect()->back();
        }
        $brand=Brand::findOrFail($id);
        $brand->update([
            'name'=> $request->name,
        ]);
        toastr()->success('successfully brand update.');
        return redirect()->route('brand.index');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        toastr()->success('successfully brand delete.');
        return redirect()->route('brand.index');
    }
}
