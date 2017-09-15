<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class messagesController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
//        $name = $request->name;
//        $email = $request->email;
//        $phone = $request->phone;
        $subject = $request->subject;
        $content = $request->content;
        $recipient_id = $request->recipient_id;
        Message::create(['subject'=>$subject,'content'=>$content,'recipient_id'=>$recipient_id]);

        return response()->json(['status' => 'success', 'msg' => 'You mail has been sent']);

    }
    
}
