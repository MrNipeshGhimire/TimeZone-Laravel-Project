<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\brand;
use App\Models\Product;

class ProductController extends Controller
{
    
//dashboard
    public function dashboard(){
        return view('dashboard.index');
    }


    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('dashboard.admin.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorys = Category::all();
        $brands = brand::all();
        return view('dashboard.admin.Product.create', compact('categorys','brands'));
    }

    
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/products', $image_new_name);

        $products = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'image' => 'uploads/products/' . $image_new_name,

        ]);
        $products->save();
        return redirect()->route('admin.products')->with('message', 'Product Stored Successfully');
    }

  
    public function edit($id)
    {
        //
        $products = Product::find($id);
        $categorys = Category::all();
        $brands = brand::all();
        return view('dashboard.admin.Product.edit', compact('products', 'categorys','brands'));
    }

  
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            "title" => "required",
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/products/', $image_new_name);
            $products->image = 'uploads/products/' . $image_new_name;
        }
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->category_id = $request->category_id;
        $products->save();
        return redirect()->route('admin.products')->with('message', 'Product Updated Successfully');
    }

    
    public function delete($id)
    {
        //
        $products = Product::find($id);
        $products->delete();
        return redirect()->back()->with('message', 'Products Deleted Successfully');
    }
}
