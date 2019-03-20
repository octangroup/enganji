<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products=Product::get();
        return view('home',compact('products'));
    }

//function to each product that is clicked on
    public function show($id){
        $product=Product::with('affiliate')->findorfail($id);
        return view('product.view',compact('product'));
    }
}
