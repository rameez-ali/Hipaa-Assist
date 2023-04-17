<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function showRegisterForm()
    {
        return view('user.auth.vendor-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        Vendor::create($request->all());

        return redirect()->intended(route('vendor.dashboard'));
    }
}