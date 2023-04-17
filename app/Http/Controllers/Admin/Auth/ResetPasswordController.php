<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {

       return view('auth.passwords.reset1', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'password-confirm' => 'required',
            ]);


         if($request->password==$request->con)
        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = Admin::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/admin/login')->with('message', 'Your password has been changed!');

    }
}