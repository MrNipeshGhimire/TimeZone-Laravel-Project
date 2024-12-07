<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function categoryList(){
        $data = Category::all();
        return view('dashboard.admin.category.categoryList',compact('data'));
    }
    //for storing brand
    public function StoreCategory(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

         $data = new Category;
         $data->name = $request->name;
         $data->slug = $request->slug;
         $data->save();
             return back();
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('dashboard.admin.category.editCategoryList', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => 'required'
        ]);

        $data = Category::find($id);

        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->save();
        return redirect()->route('categoryList');
    }

    public function delete($id)
    {
        $data = Category::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $data->delete();
        return back();
    }
}
