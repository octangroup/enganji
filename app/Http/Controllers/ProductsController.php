<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Condition;
use App\Currency;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /*
     * This function will display available products on the home page
     */
    public function index(){
        $products = Product::with('currency','subcategory','brand','condition')->get();
        return view('home',compact('products'));
    }

/*
 * function to each product that is clicked on
 */
   public function show($id){
       $product=Product::with('affiliate')->findorfail($id);
       return view('product.view',compact('product'));
   }
   /*
    * This function will search according to the keyword you have put in the search field
    */
    public function search(Request $request){

        $keyword = $request->keyword;
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('home', compact('products', 'keyword', 'conditions', 'subcategories', 'brands', 'currencies', 'categories'));
    }

    /*
     * This function is in charge of filtering a product according to certain parameter
     * chosen
     */
    public function filterByPrice(Request $request)
    {
        $this->validate($request, [
            'min_price' => 'nullable|numeric',
            'max_price' => 'required|numeric'

        ]);

    }
}
