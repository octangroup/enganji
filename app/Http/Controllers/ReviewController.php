<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    /*
    * function to let the user review a product
    */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function store(Request $request, $id)
    {
         $this->validate($request, [
            'rating' => 'required|numeric',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::User()->id,
            'product_id' => $id,
            'rating' => $request->rating,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }
}
