<?php

namespace App\Http\Controllers\Affiliate;

use App\Brand;
use App\Condition;
use App\Currency;
use App\Http\Requests\ProductForm;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('affiliate.auth');
    }
    /*
     * This function displays the index page of products in affiliate side
     */
    public function index(){
        $conditions = Condition::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();
        return view('affiliate.products.index')->with('conditions',$conditions)->with('subcategories',$subcategories)
            ->with('brands',$brands)->with('currencies',$currencies);
    }
/*
 * this method stores products in products database
 */
    public function store(ProductForm $form){
        $product =  $form->createProduct();
        return back();
    }
  /*
 * this method updates products in products database
 */
  public function update(ProductForm $form,$id){
     $product = $form->update($id);
     return back();
  }
  /*
   * this method deletes a selected product in a database
   */
  public function delete($id){
      $product = Product::findOrfail($id);
      $product->delete();
      return back();
  }
}
