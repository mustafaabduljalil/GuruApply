<?php

namespace App\Http\Controllers;

use App\SubscriptionEmail;
use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    //

    public function subscription(Request $request)
    {
        $email = $request->email;

        SubscriptionEmail::create(['email'=>$email]);
        return response()->json(['status'=>'success','msg'=>'Thank you for subscription']);

    }
}
