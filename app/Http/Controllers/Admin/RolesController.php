<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This function displays the index page of roles
     */

    public function index(){
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }
    /*
     * This function store a role in database
     */
    public function store(Request $request){
       $this->validate($request,[
           'name'=>'required|string'
       ]) ;

       $add = new Role();
       $add->name = $request->name;
       $add->save();
       return back();
    }

    public function update(Request $request,$id)
    {

            $this->validate($request, [
                'name' => 'required|string'
            ]);
            $add = Role::findOrFail($id);
            $add->name = $request->name;
            $add->save();
            return back();

    }
    /*
    * this function is in charge of deleting  a role
    */

    public function delete($id)
    {
            $role = Role::findOrFail($id)->delete();
            return back();

    }
}
