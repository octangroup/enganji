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
    /*
     * The function in charge to store deals in the database
     */
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
    /*
     * the function in charge of updating a certain deal
     */
    public function update(Request $request,$id){
        $this->validate($request,[
            'product_id'=>'required|int',
            'price'=>'required|numeric',
            'begin_on'=>'required|date',
            'end_at'=>'required|date'
        ]);
        $add = Deal::findOrFail($id);
        $add -> product_id = $request->product_id;
        $add ->price = $request->price;
        $add ->begin_on = $request->begin_on;
        $add ->end_at = $request->end_at;
        $add->save();
        return back();
    }

    /*
     * this function is in charge of deleting a deal
     */
    public function delete($id){
        $deal = Deal::findOrFail($id)->delete();
        return back();
    }
}
