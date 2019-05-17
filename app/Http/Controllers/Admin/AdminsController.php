<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This  function shall display the index page of admins
     */

    public function index(){

            $roles = Role::get();
            $admins = Admin::with('roles')->get();
            return view('admin.admins.index',compact('admins','roles'));
    }

    /*
     * This function shall change the status of admin
     */
    public function changeStatus($id)
    {

            $admin = Admin::findorfail($id);
            if (!$admin->is_Active()) {
                $admin->activate();
                return back();
            }
            $admin->deactivate();
            return back();

    }
    /*
     * This function will remove a role to a certain admin
     */
    public function deleteRole($admin_id,$role_id)
    {

            $admin = Admin::findOrFail($admin_id);
            $admin->roles()->detach($role_id);
            return back();

    }
    /*
     * This is shall add roles to a certain admin
     */

    public function addRole(Request $request,$admin_id)
    {

            $admin = Admin::findOrFail($admin_id);
            foreach ($request['roles'] as $role) {
                $admin->roles()->attach($role);
            }
            $admin->save();
            return back();

    }

    public function search(Request $request){

        $keyword = $request->keyword;
        $roles = Role::get();
        $admins = Admin::where('name','like','%'.$keyword.'%')->get();

        return view('admin.admins.index', compact('admins','keyword','roles'));
    }
}
