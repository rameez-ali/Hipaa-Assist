<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users_training;
use Session;
use Stripe;
use Redirect;

class CheckoutController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        dd($request);
        Stripe\Stripe::setApiKey("sk_test_kE8rvPCiBwDDgBW3HRKKgJ9M");
        Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Credited Against Training Purchase." 
        ]);

        //Mark that User Paid for the training
        $user_id=Auth::guard('vendor')->id();
        Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['payment_status'=> 1]);
  
        return Redirect::back()->with('error_code', 5);

    }
}
