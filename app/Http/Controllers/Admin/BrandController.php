<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This method displays the index page of brands and get all brands from the
     * database
     */
    public function index(){
        $brands = Brand::get();
        return view('admin.brands.index')->with('brands',$brands);
    }
    /*
  * This method is used to store brands
  */
    public function store(Request $request){

        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = new Brand();
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * This method is used to update a brand
     */
    public function update(Request $request,$id){
        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = Brand::findOrFail($id);
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
    * This method is used to delete a brand
    */
    public function delete($id){
        $currency = Brand::findOrFail($id);
        $currency->delete();
        return back();
    }


}
