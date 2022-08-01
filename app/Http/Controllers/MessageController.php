<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index() {
        $id = Auth::user()->id;
        $messages = Message::where('receiver_id',$id)
            ->orderBy('id','DESC')
            ->get();

        return view('Message.index', [
            'messages' => $messages,
        ]);
    }

    public function messageIndex($id) {

        $user_receiver = User::query()
            ->where('id',$id)
            ->first();
        $sender_id = Auth::user()->id;
        $user_sender = User::query()
            ->where('id',$sender_id)
            ->first();

        return view('Message.create',[
            'receiver' => $user_receiver,
            'sender' => $user_sender,
        ]);
    }

    public function create()
    {
        //
    }


    public function storeMessage(Request $request) {

        $validate = Validator::make($request->all(),[
            'message' => [
                'required',
                'string',
                'max:20'
            ],
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error','Empty Message');
        }
        else{
        $store = new Message;
        $store->receiver_id = $request->id;
        $store->message = $request->message;
        $store->message_subject = $request->message_subject;
        $store->sender_id = Auth::user()->id;
        $store->isSeen = false;
        $store->timestamp_seen = Carbon::now();
        $store->save();
            return redirect()->back()->with('message','Message sent!');
        }
    }
    public function sentItems() {

        $id = Auth::user()->id;
        $sent_items = Message::where('sender_id',$id)
            ->orderBy('id','DESC')
            ->get();

        return view('Message.Sent-Items.index', [
            'sent_items' => $sent_items,
        ]);
    }
    public function destroy($id) {
        $des = Message::find($id);
        $des->delete();
        return redirect()->back()
                ->with('message','Message deleted');
    }

    public function show(Message $message)
    {
        if(!$message->isSeen) {
        $message->isSeen = true;
        $message->update();
        }

        $getMessage = Message::where('receiver_id', Auth::user()->id)
                    ->where('sender_id',$message->sender_id)
                    ->orderBy('id','DESC')
                    ->get();
        $getUser = User::where('id',$message->sender_id);
        return view('Message.show',[
            'messages' => $getMessage,
            'user' => $getUser,
        ]);
    }


    public function edit(Message $message)
    {
        //
    }

    public function update(Request $request, Message $message)
    {
        //
    }

}
