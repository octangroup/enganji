<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\Charts\Echarts;
use App\Affiliate;
use App\User;


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
        $users = User::get();           // to get users
        $affiliates = Affiliate::get();    // to get Affiliates
        $products = Product::get();
        $today_products = Product::whereDate('created_at', '=',Carbon::now())->count();      // Analytics to view products added today
        $last_week_products = Product::whereDate('created_at', '>=', Carbon::now()->subWeek()->startOfWeek())   // Analytics to view products added last week
            ->whereDate('created_at','<=', Carbon::now()->subWeek()->endOfWeek())
            ->count();
        $this_week_products = Product::whereDate('created_at', '=', Carbon::now()->startOfWeek())->count();   // Analytics to view products added from that week

        $chart = new Echarts();
        $chart->labels(['Last Week', 'Today', 'This Week']);
        $chart->dataset('product chart view','line',[$last_week_products,$today_products,$this_week_products]);
        $chart->loaderColor('#0d3659');

        $todayUsers=User::whereDate('created_at','=',Carbon::now()->startOfDay())->count();
        $thisWeekUsers=User::whereDate('created_at','=',Carbon::now()->startOfWeek())->count();
        $lastWeekUsers=User::whereDate('created_at','>=',Carbon::now()->subWeek()->startOfWeek())->whereDate('created_at','<=',Carbon::now()->subWeek()->endOfWeek())->count();

        $userChart = new Echarts();
        $userChart->labels(['Last week','Today', 'This Week']);
        $userChart->dataset('Users','line',[$thisWeekUsers, $todayUsers, $lastWeekUsers]);
        $userChart->loaderColor('#0d3659');

        return view('admin.home', compact('today_products', 'this_week_products','last_week_products','chart', 'todayUsers', 'thisWeekUsers','lastWeekUsers', 'userChart', 'users', 'affiliates', 'products'));
    }
}
