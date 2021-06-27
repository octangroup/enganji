<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        //
        $user = Auth::user();
        return view('profile.index', compact('user'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        Flash::push(
            'success', 'UserName Changed',
            'Profile'
        );
        return back();
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [

            'old' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed'
        ]);

        $old = $request->old;
        $new_password = $request->new_password;

        $user = Auth::user();

        if (password_verify($old, $user->password)) {
            $new_password = bcrypt($new_password);
            $user->password = $new_password;
            $user->save();
            Flash::push(
                'success', 'Password changed',
                'Account Settings'
            );
        } else {
            Flash::push(
                'error', 'Unable to verify the password',
                'Account Settings'
            );
        }

        return back();

    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'fileToUpload' => 'required'
        ]);

        $user = Auth::user();

        if ($request->fileToUpload) {
            $user->clearMediaCollection();
            $user->addMediaFromRequest('fileToUpload')
                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                ->preservingOriginal()
                ->toMediaCollection();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
