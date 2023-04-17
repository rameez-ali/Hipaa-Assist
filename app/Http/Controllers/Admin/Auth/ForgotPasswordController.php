<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

        public function getEmail()
        {
        return view('admin.auth.passwords.reset');
        }

        public function postEmail(Request $request)
        {
          $request->validate([
            'email'     => 'required'
        ]);
        $token = str_random(64);

        DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

      try {
       Mail::send('verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
       });
     } catch (\Exception $e) {
           $hello="some error !";
            dd($e);
    }

         return view('admin.verification');
  }
}
