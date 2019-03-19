<?php

namespace App\Http\Controllers\Admin;

use App\Affiliate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AffiliatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /*
     * This function is in charge of displaying all affiliates in database
     */
    public function index()
    {
        $affiliates = Affiliate::get();
        return view('admin.affiliates.index')->with('affiliates', $affiliates);
    }

    /*
     * This function is in charge of changing the status of an affiliate
     */
    public function changeStatus($id){
        $affiliate = Affiliate::findOrfail($id);
        if ($affiliate->status === 1){
          $affiliate->status = 0;
        }else{
            $affiliate->status = 1;
        }
        $affiliate->save();
        return back();


        Session::flash('message','Affiliate has be Banned');
    }



    }
