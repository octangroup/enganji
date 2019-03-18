<?php

namespace App\Http\Controllers\Affiliate;

use App\Deal;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
    //
    /*
     * main function to view all the deals
     */
    public function index(){
        $products=Product::get();
        $deals = Deal::get();

        return view('affiliate.deals.index',compact('products', 'deals'));
    }

    public function store(Request $request){
        $this->validate($request,[
           'product_id'=>'required|int',
           'price'=>'required|numeric',
           'begin_on'=>'required|date',
           'end_at'=>'required|date'
        ]);

           Deal::create([
           'product_id'=>$request->product_id,
           'price'=>$request->price,
            'begin_on'=>$request->begin_on,
            'end_at'=>$request->end_at,
        ]);

        return back();
    }
}
