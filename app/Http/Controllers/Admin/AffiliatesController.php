<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\ActivateAffiliate;
use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $affiliates = Affiliate::where('name', 'like', '%' . $keyword . '%')->get();
        return view('admin.affiliates.index', compact('affiliates', 'keyword'));
    }

    /*
     * This function is in charge of changing the status of an affiliate
     */
    public function changeStatus($id)
    {

        $affiliate = Affiliate::findorfail($id);
        if (!$affiliate->isActive()) {
            $affiliate->activate();
            Session::flash('message', 'Affiliate has been activated');
            event(new ActivateAffiliate($affiliate));
            return back();
        }
        $affiliate->deactivate();
        event(new ActivateAffiliate($affiliate));
        Session::flash('message', 'Affiliate has been Banned');
        return back();
    }


}
