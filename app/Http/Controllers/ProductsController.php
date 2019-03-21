<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Condition;
use App\Currency;
use App\Http\Requests\ProductFilterForm;
use App\Product;
use App\SubCategory;
use App\WishList;
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

        $product = Product::with('affiliate','reviews.user')->findorfail($id);
        return view('product.view', compact('product'));
    }


    /*
     * the function that will add a product to wish list
     */
    public function addToWishList(Request $request,$id){

        $add = new WishList();
        $add->user_id =Auth::user()->id;
        $add->product_id = $id;
        $add->save();
        return back();

    }
}
