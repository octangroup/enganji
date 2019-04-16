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



    public function index(ProductFilterForm $filterForm, $category_name, $category_id, $subcategory_name = null, $subcategory_id = null)
    {
       $query = Product::query();
//       if ($subcategory_id) {
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

        $brands = $this->findBrands($query);
        $conditions = $this->findConditions($query);
        $query = $filterForm->handle($query);
        $products = $query->with('currency', 'brand', 'affiliate')->get();
        $attributes = $filterForm;
        $categories = Category::get()->take(8);
        return view('product.index', compact('products', 'brands','conditions', 'attributes','categories'));
    }


    /**
     * @param ProductFilterForm $filterForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(ProductFilterForm $filterForm)
    {
        // $query = $query->isActive();

        $categories=Category::get();
        $query = Product::query();
        $brands = $this->findBrands($query);
        $category = $this->findCategories($query);
        $conditions = $this->findConditions($query);
        $query = $filterForm->handle($query);
        $products = $query->with('currency','condition', 'brand','subcategory', 'affiliate')->get();
        $attributes = $filterForm;
        $keyword = $filterForm->keyword;
        return view('product.index', compact('products', 'brands','conditions','category', 'attributes','categories', 'keyword'));
    }

    /*
     * function to each product that is clicked on
     */
    public function show($id)
    {

        $product = Product::with('affiliate','reviews.user')->findorfail($id);
        $product->incrementVisits();
        return view('product.view', compact('product'));
    }

    /*
     *  the function which is in charge of retrieving products which belongs to a certain brand
     */

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

    /*
     *  the function which is in charge of retrieving products which belongs to a certain category
     */


    private function findCategories($query)
    {
        $products = $query->get()->groupBy('category_id');
        $categories = collect();
        foreach ($products as $product){
            if($product->first() && $product->first()->subcategory){
                $categories->push($product->first()->subcategory);
            }
        }
        return $categories;
    }

    /*
     *  the function which is in charge of retrieving products which belongs to a certain condition
     */


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
