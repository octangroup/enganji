<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //
    public function send(Request $request)
    {
        $this->validate($request, [
            'affiliate_id' => 'required|int|exists:affiliate_master,id',
            'body' => 'required|string'
        ]);
        $conversation = Auth::user()->conversations()
            ->firstorCreate([
                'affiliate_id' => $request->affiliate_id,
            ]);
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'body' => $request->body,
            'from_affiliate'
        ]);


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
