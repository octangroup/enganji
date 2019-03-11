<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Requests\ProductForm;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('affiliate.auth');
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
