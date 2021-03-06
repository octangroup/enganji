<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('chat.index');
    }


    public function fetchConversations()
    {
        $conversations = Auth::User()->conversations()->with('user', 'affiliate')->get();
        return response(['conversations' => $conversations]);
    }


    public function searchConversation($keyword)
    {
        $conversations = Auth::User()->conversations()->user()->where('user', '=', $keyword)->get();
        return response(['conversations' => $conversations]);
    }


    public function send(Request $request)
    {

        $this->validate(
            $request, [
                'body' => 'required|string',
            ]
        );
        $conversation = Conversation::firstOrCreate(
            [
                'user_id' => \Auth::user()->id,
                'affiliate_id' => $request->affiliate_id,
            ]
        );
        $conversation->save();
        $conversation->messages()->create(
            [
                'product_id' => $request->product_id,
                'body' => $request->body,
                'from_affiliate' => false,
            ]
        );
        return ['message' => 'success'];


    }


    public function fetchMessages(Request $request)
    {

        $this->validate($request, [
            'affiliate_id' => 'required|int',
        ]);

        $conversation = Auth::user()->conversations()->firstOrNew([
            'id' => $request->affiliate_id]);
        $messages = $conversation->messages()->get();
        return response(['messages' => $messages]);

    }
}
