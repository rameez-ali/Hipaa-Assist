<?php

namespace App\Http\Controllers\user_ajax_image_upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Vendor;

class ImageUploadController extends Controller
{
     public function index()
    {
        return view('user.profile.getmyprofile');
    }
 
    public function store(Request $request)
    {
    	// dd($request->profile_image);
       request()->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

        $user_id=Auth::guard('vendor')->id();

       if ($files = $request->file('profile_image')) {
          // Define upload path
           $destinationPath = public_path('/app-assets/images/profile_images_users'); // upload path
          // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['image'] = "$profileImage";
        // Save In Database
            $user = Vendor::where('id', $user_id)
                      ->update(['image' => $insert['image']]);
        }
        
        $image = Vendor::select('image')->where('id',$user_id)->pluck('image');
        return Response()->json($image);
    }
}
