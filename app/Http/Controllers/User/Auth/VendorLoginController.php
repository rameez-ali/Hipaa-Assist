<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorLoginController extends Controller
{
      public $successStatus = 200;
  public $HTTP_FORBIDDEN = 403;
  public $HTTP_NOT_FOUND = 404;
  
    public function __construct()
    {
        $this->middleware('guest:vendor')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.vendor-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
         return response()->json(['success'=>'Login Successfull !','statusCode'=>'200']);

        }
        else{
         return response()->json(['success'=>'Login Failed !','statusCode'=>'404']);

        }

    }

     public function logout(Request $request) {
     Auth::guard('vendor')->logout();
     return redirect()->intended(route('vendor.login'));
     }
}