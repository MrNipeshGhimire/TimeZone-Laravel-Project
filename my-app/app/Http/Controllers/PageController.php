<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\brand;
use App\Models\Product;

class PageController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('frontend.index',compact('product'));
    }

    public function productDetail($id){
        $product= Product::find($id);
        $categorys = Category::all();
        $brands = brand::all();
        return view('frontend.pages.product_detail',compact('product','categorys','brands'));
    }
    
    public function shop(){
        return view('frontend.pages.shop');
    }

    public function about(){
        return view('frontend.pages.about');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
    
    //admin dashboard
    public function dashboard(){
        return view('dashboard.index');
    }

   
    //cart
    public function cart(){
        return view('frontend.pages.cart');
    }

}
