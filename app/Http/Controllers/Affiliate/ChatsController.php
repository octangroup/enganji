<?php

namespace App\Http\Controllers\Affiliate;

use App\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('affiliate.auth');
    }

    //
    public function index()
    {

        $conversations = Auth::guard('affiliate')->user()->conversation()->with('user', 'affiliate')->get();
        return view('affiliate.chat.index')
            ->with('conversations', $conversations);
    }

    public function fetchConversations()
    {
        $conversations = Auth::guard('affiliate')->user()->conversation()->with('user', 'affiliate')->get();

        return ['conversations' => $conversations];

    }


    public function send(Request $request)
    {

        $this->validate(
            $request, [
                'conversation_id' => 'required|int',
                'body' => 'required|string',
            ]
        );

        $conversation = Auth::guard('affiliate')->user()->conversation()->find($request->conversation_id);
        $conversation->messages()->create(
            [
                'conversation_id' => $request->conversation_id
                , 'body' => $request->body,
                'from_affiliate' => true,
            ]
        );

        return ['message' => 'success'];


    }


    public function fetchMessages(Request $request)
    {

        $this->validate(
            $request, [
                'conversation_id' => 'required|int'
            ]
        );

        $conversations = Auth::guard('affiliate')->user()->conversation()->findOrFail($request->conversation_id);
        $messages =
            $conversations
                ->messages()
                ->latest()
                ->paginate(20);

        return response()->json($messages);
    }


}
