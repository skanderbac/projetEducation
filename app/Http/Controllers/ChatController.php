<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Chatbox;
use App\Models\Student;
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
        if(auth()->user()->role!='Admin'){
            $msg = Chat::join('chatboxes', 'chatboxes.id', '=', 'chats.chatbox_id')
                ->join('users', 'users.id', '=', 'chats.user_id')
                ->where('chats.chatbox_id',1)
                ->get();

            if(auth()->user()->role=='Eleve'){
                $eleve=Student::where('user_id','=',auth()->user()->id)->first();
                if($eleve->blocked==1){
                    return redirect('/');
                }
            }
            return view('chat.index',compact('msg'));
        }
        else{
            return redirect('/admin/bacs');
        }

    }

    public function getMessage($chatbox_id)
    {
        $msg = Chat::join('chatboxes', 'chatboxes.id', '=', 'chats.chatbox_id')
            ->join('users', 'users.id', '=', 'chats.user_id')
            ->where('chats.chatbox_id',$chatbox_id)
            ->orderBy('chats.created_at','ASC')
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

    public function createchatbox(Request $request){
        $chatbox=Chatbox::where('chatboxes.user1_id','=',auth()->user()->id)
            ->where('chatboxes.user2_id',$request->get('user_id'))
            ->orwhere('chatboxes.user1_id',$request->get('user_id'))
            ->where('chatboxes.user2_id',auth()->user()->id)
            ->get();

        $test=0;
        foreach ($chatbox as $c) {
            $test++;
        }

        if($test==0){
            Chatbox::create([
                'user1_id'=>auth()->user()->id,
                'user2_id'=>$request->get('user_id')
            ]);
        }

        return redirect('/chat');
    }
}
