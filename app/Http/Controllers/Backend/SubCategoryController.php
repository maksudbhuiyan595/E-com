<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = subCategory::with(['category'])->get();
        return view("backend.layouts.subcategories.index", compact("subcategories"));
    }
    public function create()
    {
        $categories=Category::all();
        return view("backend.layouts.subcategories.create", compact("categories"));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id'=>'required'
        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->getMessageBag());
            return redirect()->back();
        }
        subCategory::create([
            'name'=> $request->name,
            'category_id'=> $request->category_id
        ]);
        toastr()->success('successfully category created.');
        return redirect()->route('subCategory.index');
        
    }
    public function edit($id)
    {   $categories=Category::all();
        $subcategory = subCategory::findOrFail($id);
        return view('backend.layouts.subcategories.edit', compact('subcategory','categories'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id'=> 'required'
        ]);
        if ($validator->fails())
        {
            toastr()->error($validator->errors()->first());
            return redirect()->back();
        }
        $category=subCategory::findOrFail($id);
        $category->update([
            'name'=> $request->name,
            'category_id'=> $request->category_id
        ]);
        toastr()->success('successfully sub-category update.');
        return redirect()->route('subCategory.index');
    }
    public function destroy($id)
    {
        $category = subCategory::findOrFail($id);
        $category->delete();
        toastr()->success('successfully subcategory delete.');
        return redirect()->route('subCategory.index');
    }
}
