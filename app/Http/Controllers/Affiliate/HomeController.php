<?php

namespace App\Http\Controllers\Affiliate;

use App\Affiliate;
use App\Http\Controllers\Controller;
use App\Product;
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
        $products=$affiliate->product()->WhereActivated()->get();
        return view('affiliate.home',compact('affiliate','products'));
    }
}
