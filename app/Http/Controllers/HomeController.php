<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
