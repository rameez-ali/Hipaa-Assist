<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Rules\MatchOldPassword;

class EditProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getmyprofile()
    {
        return view('admin.profile.getmyprofile');
    }

    public function editprofile()
    {
        return view('admin.profile.editprofile');
    }

    public function updateprofile(Request $request)
    {
        auth()->user()->update($request->all());

        return back()->with('admin.profileupdatesuccess','Profile Updated Successfully');
    }

    public function profilepicupdate(Request $request)
    {
       dd($request->file);
    }

    public function passwordupdate(Request $request)
    {     
        $status=Hash::check($request->old_password, auth()->user()->password);


        if($status==true){
            if($request->new_password == $request->password_confirmation)
            {
                Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
                return redirect('admin/getmyprofile')->with('passwordupdatesuccess','Password Update Successfully');
            }
            else{
                return redirect('admin/getmyprofile')->with('confirmpassfailedsuccess','Confirm password did not match with new password');
            }
        }
        else{
            return redirect('admin/getmyprofile')->with('oldpassfailedsuccess','Old password is wrong');
        }
   
   

        
    }
    
}
