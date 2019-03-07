<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

     /*
      * This method displays the index page of currencies and list all
      * types currencies in database
      */
     public function index(){
         $currencies = Currency::get(); //retrieve all currencies in the database
         return view('admin.currencies.index')->with('currencies',$currencies);
     }
    /*
     * This method is used to store currencies
     */
    public function store(Request $request){

        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = new Currency();
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * This method is used to update a currency
     */
    public function update(Request $request,$id){
        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = Currency::findOrFail($id);
        $add->name = $request->name;
        $add->save();
        return back();
    }
    /*
     * This method is used to delete a currency
     */
    public function delete($id){
        $currency = Currency::findOrFail($id);
        $currency->delete();
        return back();
    }

}
