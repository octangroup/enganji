<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /*
     * This function displays the index page of products in admin side
     */
    public function index(){
        $products= Product::get();
        return view('admin.products.index')->with('products',$products);
    }
    /*
     * This method changes the status of a product
     */
    public function changeStatus($id){
        $product = Product::findOrFail($id);
        if ($product->status === 0){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        $product->save();
        return back();
    }
}
