<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use App\Rules\MatchOldPassword;

class EditProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getmyprofile()
    {
        $user_id=Auth::guard('vendor')->id();

        $user=Vendor::where('id',$user_id)->first();
        return view('user.profile.getmyprofile',compact('user'));
    }

    public function editprofile()
    {
        return view('user.profile.editprofile');
    }

    public function updateprofile(Request $request)
    {
        $user_id=Auth::guard('vendor')->id();

        $users=Vendor::where('id',$user_id)->update(['firstname'=> $request->firstname,'lastname'=> $request->lastname,'email'=> $request->email]);

        return redirect('vendor/getmyprofile')->with('profileupdatesuccess','Confirm password did not match with new password');
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
                Vendor::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
                return redirect('vendor/getmyprofile')->with('passwordupdatesuccess','Password Update Successfully');
            }
            else{
                return redirect('vendor/getmyprofile')->with('confirmpassfailedsuccess','Confirm password did not match with new password');
            }
        }
        else{
            return redirect('vendor/getmyprofile')->with('oldpassfailedsuccess','Old password is wrong');
        }
   
   

        
    }
    
}
