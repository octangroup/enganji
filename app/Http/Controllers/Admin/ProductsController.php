<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
        $product=Product::findorfail($id);

        if(!$product->isActive()){
            $product->activate();
           Session::flash('success', 'The Product has been activated');
            return back();
        }
        $product->deactivate();
        Session::flash('success', 'The Product has been deactivated');
        return back();
    }
}
