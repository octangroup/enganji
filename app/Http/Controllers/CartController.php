<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){
        $categories = Category::get()->take(8);
        $carts = Auth::User()->cart()->with('product')->get();
        return view('cart.index', compact('carts','categories'));
    }




  //function to store cart
    public function store(Request $request){

        $this->validate($request, [
            'product_id' => 'required|int',
            'quantity' => 'required|int'
        ]);

        $product = Product::findOrFail($request->product_id);

        if (Cart::addProduct($product, $request)) {
            Session::flash('message','Product Added to Cart');
            return redirect()->back();
        }
        Session::flash('message','Product not Added to Cart');
        return redirect()->back();
    }


//function to delete item from cart
    public function destroy($id){
        Cart::findorFail($id)->delete();
        return back();
    }
}
