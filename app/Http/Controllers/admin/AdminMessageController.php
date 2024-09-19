<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function get_message(Request $request){
        $request->validate([
            'message'       => ['required','integer','exists:messages,id'],
        ]);
        $message = Message::find($request->message);
        $message->update([
            'read'      => 1,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => $message,
        ]);
    }
    public function messages_in_time(){
        $new_messages = Message::where('read',0)->orderBy('created_at', 'desc')->take(10)->get();

        return response()->json([
            'status'    => true,
            'messages'  => $new_messages,
        ]);
    }
    public function read_message(Message $message){
        $message->update([
            'read'  => 1,
        ]);
        $messages = Message::all();
        
        return view('admin.mail-inbox',compact('messages','message'));
    }
    public function read_all_messages(){
        $new_messages = Message::where('read',0)->get();
        foreach($new_messages as $message){
            $message->update([
                'read'  => 1,
            ]);
        }
        return response()->json([
            'status'    => true,
        ]);
    }
}
