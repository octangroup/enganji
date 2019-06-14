<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function index()
    {
        //
        $categories = Category::with('subCategory')->get(); //retrieve all categories available in database
        return view('admin.categories.index', compact('categories'));
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
    public function store(CategoryForm $category)
    {
       $category->createCategory();
       Session::flash('message','Category Uploaded');
       return back();
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $categories = Category::where('name','like','%'.$keyword.'%')->get();
        return view('admin.categories.index', compact('categories','keyword'));
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
    public function update(CategoryForm $form, $id)
    {
        $form->update($id);
        Session::flash('message','Category Updated');
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
        Category::findOrFail($id)->delete();
        Session::flash('message','Category Deleted');
        return back();
    }
}
