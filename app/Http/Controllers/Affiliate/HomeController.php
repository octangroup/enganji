<?php

namespace App\Http\Controllers\Affiliate;

use App\Affiliate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('affiliate.auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliate=Auth::guard('affiliate')->user();
//        dd($affiliate->check_subscription());

        return view('affiliate.home',compact('affiliate'));
    }
}
