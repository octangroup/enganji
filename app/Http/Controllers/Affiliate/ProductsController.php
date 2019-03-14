<?php

namespace App\Http\Controllers\Affiliate;

use App\Brand;
use App\Condition;
use App\Currency;
use App\Http\Requests\ProductForm;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('affiliate.auth');
    }
    public function index()
    {
        //
        $conditions = Condition::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        $currencies = Currency::get();

        return view('affiliate.products.index', compact('conditions','subcategories','brands','currencies'));

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductForm $form)
    {
//        try{
//            $this->validate($request,[
//                'subcategory_id' => 'required',
//                'currency_id' => 'required',
//                'brand_id' => 'required',
//                'condition_id' => 'required',
//                'name' => 'required|string',
//                'quantity' => 'required|numeric',
//                'price' => 'required|numeric',
//                'color' => 'nullable|string',
//                'size' => 'nullable|string',
//                'description' => 'required|string',
//            ]);
//        }catch (\Exception $exception){
//            dd($exception);
//        }

        $form->createProduct();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductForm $form, $id)
    {
        //
        $form->update($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrfail($id);
        $product->delete();
        return back();
    }
}
