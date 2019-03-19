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

        return view('affiliate.deals.index',compact('products'));
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



    public function update(Request $request,$id){
        $this->validate($request,[
            'product_id'=>'required|int',
            'price'=>'required|numeric',
            'begin_on'=>'required|date',
            'end_at'=>'required|date',
        ]);
        $deal=Deal::findOrFail($id);
        $deal->price=$request->price;
        $deal->begin_on=$request->begin_on;
        $deal->end_at=$request->end_at;
        $deal->save();
        return redirect()->back();
    }
}
