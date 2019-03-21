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

    public function __construct()
    {
        $this->middleware('auth')->except('index','show','search');
    }

    /*
     * This function will display available products on the home page
     */
    public function index(){

        $products = Product::with('currency','subcategory','brand','condition')->get();
        return view('product.index',compact('products'));
    }

//    public function index(ProductFilterForm $filterForm, $category_name, $category_id, $subcategory_name = null, $subcategory_id = null)
//    {
//       $query = Product::query();
//        if ($subcategory_id) {
//            $selected_subcategory = Subcategory::whereHas('category')->findOrFail($subcategory_id);
//            $category = $selected_subcategory->category;
//
//            $query = $query->where('subcategory_id', $subcategory_id);
//
//        } else {
//            $selected_subcategory = null;
//            $category = Category::findOrFail($category_id);
//
//            $query = $query->whereHas('subcategory', function ($q) use ($category_id) {
//                $q->where('category_id', $category_id);
//            });
//        }
//        $query = $query->whereIsActive();
//        $brands = $this->findBrands($query);
//        $conditions = $this->findConditions($query);
//       // $categorys = $this->findCategories($query);
//        $query = $filterForm->handle($query);
//        $products = $query->with('currency', 'brand', 'affiliate')->get();
//        $attributes = $filterForm;
//        $categories = Category::get()->take(8);
//        return view('product.index', compact('products', 'brands', 'category','conditions', 'selected_subcategory', 'attributes','categories'));
//    }




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
        return view('product.index', compact('products', 'keyword', 'conditions', 'subcategories', 'brands', 'currencies', 'categories'));
    }

    /*
     * This function is in charge of filtering and search a product according to certain parameter
     * chosen
     */
//    public function search(ProductFilterForm $filterForm)
//    {
//        dd($filterForm);
//        $categories=Category::get();
//        $query = Product::query();
//        $query = $query->whereIsActive();
//        $brands = $this->findBrands($query);
//        $conditions = $this->findConditions($query);
//        $category = $this->findCategories($query);
//        $query = $filterForm->handle($query);
//        $products = $query->with('currency', 'brand','condition','category', 'affiliate')->get();
//        $attributes = $filterForm;
//        $keyword = $filterForm->keyword;
//        return view('product.index', compact('products', 'brands', 'attributes','categories', 'keyword','conditions','category'));
//    }

    private function findBrands($query)
    {
        $products = $query->get()->groupBy('brand_id');
        $brands = collect();
        foreach ($products as $product){
            if($product->first() && $product->first()->brand){
                $brands->push($product->first()->brand);
            }
        }
        return $brands;
    }

    private function findConditions($query)
    {
        $products = $query->get()->groupBy('condition_id');
        $conditions = collect();
        foreach ($products as $product){
            if($product->first() && $product->first()->condition){
                $conditions->push($product->first()->condition);
            }
        }
        return $conditions;
    }

    private function findCategories($query)
    {
        $products = $query->get()->groupBy('condition_id');
        $categories = collect();
        foreach ($products as $product){
            if($product->first() && $product->first()->category){
                $categories->push($product->first()->category);
            }
        }
        return $categories;
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
