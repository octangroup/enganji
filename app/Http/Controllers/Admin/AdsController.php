<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index()
    {
//        if (\Auth::guard('admin')->user()->canManageAffiliates()) {
        $ads = Advertisement::paginate(20);
        return view('admin.ads.index', compact('ads'));
//        }
//        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(
            $request, [
                'title' => 'required|string',
                'body' => 'required|string',
                'product_listing' => 'nullable|string',
                'home_page' => 'nullable|string',
                'link' => 'required|string',
                'starting_on' => 'required|date',
                'ending_on' => 'required|date'

            ]
        );
//        if (\Auth::guard('admin')->user()->canManageAffiliates()) {
        $ad = Advertisement::create(
            [
                'admin_id' => Auth::guard('admin')->user()->id,
                'title' => $request->title,
                'body' => $request->body,
                'link' => $request->link,
                'product_listing' => $request->product_listing == 1,
                'home_page' => $request->home_page == 1,
                'ending_on' => $request->ending_on,
                'starting_on' => $request->starting_on,
            ]
        );

        if ($request->file) {
            $ad->clearMediaCollection();
            $ad->addMediaFromRequest('file')
                ->usingFileName(time() . '-' . random_int(1, 999999999))
                ->toMediaCollection();
        }
//        }
        return back();
    }

    public function search(Request $request)
    {
        if (Auth::guard('admin')->user()->canManageAffiliates()) {
            $keyword = $request->keyword;
            $ads = Advertisement::where('title', 'like', '%' . $keyword . '%')->get();

            return view('admin.ads.index', compact('keyword', 'ads'));
        }
        return abort(403);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
                'title' => 'required|string',
                'body' => 'required|string',
                'product_listing' => 'nullable|string',
                'home_page' => 'nullable|string',
                'link' => 'required|string',
                'starting_on' => 'required|date',
                'ending_on' => 'required|date'

            ]
        );


        $advert = Advertisement::findOrFail($id);
        $advert->title = $request->title;
        $advert->body = $request->body;
        $advert->product_listing = $request->product_listing;
        $advert->home_page = $request->home_page;
        $advert->link = $request->link;
        $advert->starting_on = $request->starting_on;
        $advert->ending_on = $request->ending_on;

        $advert->save();
        if ($request->file) {
            $advert->clearMediaCollection();
            $advert->addMediaFromRequest('file')
                ->usingFileName(time() . '-' . random_int(1, 999999999))
                ->toMediaCollection();
        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::guard('admin')->user()->advertisement()->findOrFail($id)->delete();
        return redirect()->back();
    }
}
