<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //
    public function index(){
        return view('chat.index');
    }


    public function fetchConversations(){
        $conversations=Auth::User()->conversations()->with('user','affiliate')->get();
        return response($conversations);
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
            ]
        );
        $conversation->save();
        $conversation->messages()->create(
            [
                'body' => $request->body,
                'from_affiliate' => false,
            ]
        );
        $conversation->notify(new NewMessageArrivedNotification());
        return ['message' => 'success'];



    }


    public function fetch(Request $request)
    {
        $this->validate($request, [
            'affiliate_id' => 'required|int|exists:affiliate_master,id',
        ]);
        $conversation = Auth::user()->conversations()->firstOrNew([
            'affiliate_id' => $request->affiliate_id]);
        $messages = $conversation->messages()->get();
        return response(['messages'=> $messages]);
    }
}
