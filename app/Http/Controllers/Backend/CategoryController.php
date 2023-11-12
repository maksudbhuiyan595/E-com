<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("backend.layouts.categories.index", compact("categories"));
    }
    public function create()
    {
        return view("backend.layouts.categories.create");
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
        Category::create([
            'name'=> $request->name,
        ]);
        toastr()->success('successfully category created.');
        return redirect()->route('category.index');
        
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.layouts.categories.edit', compact('category'));
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
        $category=Category::findOrFail($id);
        $category->update([
            'name'=> $request->name,
        ]);
        toastr()->success('successfully category update.');
        return redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->success('successfully category delete.');
        return redirect()->route('category.index');
    }
}
