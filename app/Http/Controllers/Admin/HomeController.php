<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\Charts\Echarts;


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

        $chart = new Echarts();
        $chart->labels(['Last Week', 'Today', 'This Week']);
        $chart->dataset('product chart view','line',[$last_week_products,$today_products,$this_week]);
        $chart->loaderColor('#0d3659');

        return view('admin.home', compact('today_products','last_week_products', 'this_week','chart'));
    }
}
