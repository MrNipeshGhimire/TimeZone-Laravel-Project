<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;

class BrandController extends Controller
{
    

    public function BrandList(){
        $data = brand::all();
        return view('dashboard.admin.brand.brandList',compact('data'));
    }
    //for storing brand
    public function StoreBrand(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

         $data = new brand;
         $data->name = $request->name;
         $data->save();
             return back();
    }

    public function edit($id)
    {
        $data = brand::find($id);
        return view('dashboard.admin.brand.editBrand', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => 'required'
        ]);

        $data = brand::find($id);

        $data->name = $request->name;
        $data->save();
        return redirect()->route('BrandList');
    }

    public function delete($id)
    {
        $data = brand::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Brand not found');
        }
        $data->delete();
        return back();
    }
}
