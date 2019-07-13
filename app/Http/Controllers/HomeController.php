<?php

namespace App\Http\Controllers;

use App\Advertisment;
use App\Deal;
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
        $products = Product::with('currency')->whereActive()->get();
        $deals = Deal::with('product')->get();
        $ads = Advertisment::get();
        return view('home', compact('products', 'deals', 'ads'));
    }

//function to each product that is clicked on
    public function show($id)
    {
        $product = Product::with('affiliate')->findorfail($id);
//        $product->incrementVisits();
        return view('product.view', compact('product'));
    }
}
