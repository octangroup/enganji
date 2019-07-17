<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('currency')->whereActive()->get()->take(20);
        $deals = Deal::with('product')->get();
        $ads = Advertisement::get();
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
