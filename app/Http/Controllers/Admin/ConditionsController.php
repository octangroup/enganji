<?php

namespace App\Http\Controllers\Admin;

use App\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This method will display the index page of manage conditions with
     * available conditions
     */
    public function index(){
        $conditions = Condition::get(); //retrieve all categories available in database
        return view('Admin.conditions.index')->with('conditions',$conditions);
    }

    /*
     * This method is used to store conditions
     */
    public function store(Request $request){

        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = new Condition();
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * This method is used to update a condition
     */
    public function update(Request $request,$id){
        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = Condition::findOrFail($id);
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * This method is used to delete a condition
     */
    public function delete($id){
        $category = Condition::findOrFail($id);
        $category->delete();
        return back();
    }
}
