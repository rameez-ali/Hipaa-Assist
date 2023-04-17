<?php

namespace App\Http\Controllers\ajax_image_upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class ImageUploadController extends Controller
{
     public function index()
    {
        return view('profile.editprofile');
    }
 
    public function store(Request $request)
    {
    	// dd($request->profile_image);
       request()->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $email=auth()->user()->email;

       if ($files = $request->file('profile_image')) {
       // Define upload path
           $destinationPath = public_path('/profile_images/'); // upload path
 // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['image'] = "$profileImage";
        // Save In Database
            $user = Admin::where('email', $email)
                      ->update(['image' => $insert['image']]);
        }
        
        $image = Admin::select('image')->where('email',$email)->pluck('image');
        return Response()->json($image);
    }
}
