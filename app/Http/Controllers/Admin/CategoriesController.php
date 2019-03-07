<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * The function to display the index page of categories
     */
    public function index()
    {
        $categories = Category::get(); //retrieve all categories available in database
        return view('admin.categories.index')->with('categories', $categories);
    }

    /*
     * The function of storing categories
     */
    public function store(Request $request)
    {

        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = new Category();
        $add->name = $request->name;
        $add->save();
        return back();
    }

    /*
     * the function in charge of updating/modifying categories
     */
    public function update(Request $request, $id)
    {
        //The function to validate if the name is filled
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        $add = Category::findOrFail($id);
        $add->name = $request->name;
        $add->save();
        return back();

    }
    /*
     * the function in charge of deleting category
     */
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
}
