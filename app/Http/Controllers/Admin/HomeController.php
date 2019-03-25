<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_products = Product::whereDate('created_at', '=',Carbon::now())->count();
        $last_week_products = Product::whereDate('created_at', '>=', Carbon::now()->subWeek()->startOfWeek())
            ->whereDate('created_at','<=', Carbon::now()->subWeek()->endOfWeek())
            ->count();
        $this_week = Product::whereDate('created_at', '=', Carbon::now()->startOfWeek())->count();

        $chart = new Echart();


        return view('admin.home', compact('today_products','last_week_products', 'this_week'));
    }
}
