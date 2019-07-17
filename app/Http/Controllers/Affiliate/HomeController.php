<?php

namespace App\Http\Controllers\Affiliate;

use App\Charts\Echarts;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


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
        $affiliate = Auth::guard('affiliate')->user();

        $products = $affiliate->products()->WhereActivated()->get();
        $productVisits = $affiliate->products()->WhereActivated()->with('visits')->get();

        $todayProducts = Product::WhereActivated()->whereDate('created_at', '=', Carbon::now()->startOfDay()->toDateTimeString())->count();
        $thisWeekProducts = Product::WhereActivated()->whereDate('created_at', '>=', Carbon::now()->startOfWeek()->toDateTimeString())->count();
        $lastWeekProducts = Product::WhereActivated()->whereDate('created_at', '=', Carbon::now()->subWeek()->startOfWeek()->toDateTimeString())->whereDate('created_at', '=', Carbon::now()->subWeek()->endOfWeek())->count();

        $chart = new Echarts();
        $chart->labels(['Last week', 'This week', 'Today']);
        $chart->dataset('Product point of view', 'line', [$lastWeekProducts, $thisWeekProducts, $todayProducts]);
        $chart->loaderColor('#0d3659');


        return view('affiliate.home', compact('affiliate', 'products', 'chart', 'thisWeekProducts',
            'lastWeekProducts', 'todayProducts', 'productVisits'));
    }
}
