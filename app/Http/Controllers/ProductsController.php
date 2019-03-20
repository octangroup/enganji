<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::get();
        return view('home', compact('conditions','subcategories','brands','currencies','products', 'categories'));
    }

//function to each product that is clicked on


    public function show($id){
        $product = Product::findorfail($id);
        return view('product.view', compact('product'));
    }



}
