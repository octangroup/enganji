<?php

namespace App\Http\Controllers\Admin;

use App\subCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /*
     * The function/method used to store sub categories
     */
    public function store(request $request,$id){
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = new SubCategory();
        $add->category_id =$id;
        $add->name =$request->name;
        $add->save();
        return back();
    }

    /*
     * this Method is in charge of updating sub categories
     */
    public function update(Request $request,$id){
        $this->validate($request, [
            'category_id'=>'required|integer',
            'name' => 'required|string'
        ]);
        $add = SubCategory::findOrFail($id);
        $add ->category_id = $request->category_id;
        $add ->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * the function that deletes the sub categories
     */
    public function delete($id){
       $sub_category = SubCategory::findOrFail($id);
       $sub_category->delete();
       return back();
    }

}
