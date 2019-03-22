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
use Illuminate\Support\Facades\Auth;


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

    /*
     * function to search product according to the keyword which will be input
     */

    public function search(Request $request){

        $keyword = $request->keyword;
        $conditions = Condition::get();
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('product.index', compact('products', 'keyword', 'conditions', 'subcategories', 'brands', 'currencies', 'categories'));
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

    /*
     * this function will delete a certain product in item
     */
    public function deleteWishList($id){
        $product = WishList::findOrFail($id)->delete();
        return back();
    }

    /*
   * this function will view products in a wishList of a certain user
   */

    public function viewWishList(){
        $wishLists = WishList::with('product.condition')->where('user_id','=',Auth::user()->id)->get();
        return view('wishList.index',compact('wishLists'));
    }
}
