<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Chatbox;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $msg = Chat::join('chatboxes', 'chatboxes.id', '=', 'chats.chatbox_id')
            ->join('users', 'users.id', '=', 'chats.user_id')
            ->where('chats.chatbox_id',1)
            ->get();
        return view('chat.index',compact('msg'));
    }

    public function getMessage($chatbox_id)
    {
        $msg = Chat::join('chatboxes', 'chatboxes.id', '=', 'chats.chatbox_id')
            ->join('users', 'users.id', '=', 'chats.user_id')
            ->where('chats.chatbox_id',$chatbox_id)
            ->get();
        return $msg;
    }
    public function sendMessage(Request $request)
    {
        Chat::create($request->all());
        return true;
    }

    public function getBox(Request $request)
    {
        $msg = Chatbox::join('users', function ($join) {
                $join->on('users.id', '=', 'chatboxes.user1_id')->orOn('users.id', '=', 'chatboxes.user2_id');
            })
            ->where('chatboxes.user1_id',$request->get('user_id'))
            ->orwhere('chatboxes.user2_id',$request->get('user_id'))
            ->get();
        return $msg;
    }
    public function getChatBox(Request $request)
    {
        $msg = Chatbox::where('chatboxes.user1_id',$request->get('user1_id'))
            ->where('chatboxes.user2_id',$request->get('user2_id'))
            ->orwhere('chatboxes.user1_id',$request->get('user2_id'))
            ->where('chatboxes.user2_id',$request->get('user1_id'))
            ->get();
        return $msg;
    }
}
