<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Auth;

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
    public function show($id)
    {
        $product = Product::with('affiliate')->findorfail($id);
        $reviews=Review::get();
        return view('product.view', compact('product','reviews'));
    }


    /*
     * function to let the user review a product
     */
    public function review(Request $request, $id)
    {
        $this->validate($request, [
            'rating'=>'required|numeric',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        Review::create([
         'user_id'=>Auth::User()->id,
         'product_id'=>$id,
         'rating'=>$request->rating,
         'title'=>$request->title,
         'body'=>$request->body,
        ]);
        return redirect()->back();
    }
}
