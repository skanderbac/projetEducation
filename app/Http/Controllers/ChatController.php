<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ChatController extends Controller
{
    public function index()
    {
        $msg = Chat::where('chat.chatbox_id',1)->orderBy('chat.created_at','asc');
        return view('chat.index',compact('msg'));
    }

    public  function getMessage()
    {
        Chat::join('chatboxes', 'id', '=', 'chat.chatbox_id')->join()->where('chat.chatbox_id',1)->orderBy('chat.created_at','asc');
    }
}
