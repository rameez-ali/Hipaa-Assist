<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistration extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function showRegisterForm()
    {
        return view('auth.vendor-register');
    }

    public function register(Request $request)
    {
         $request->validate([
            'firstname'     => 'required',
            'lastname'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
            'category_id'     => 'required',
            'training_id'     => 'required'
        ]);

        //Getiing last category_id in form of collection
        $last_user_id = User::orderBy('id', 'DESC')->value('user_id');

        if($last_user_id!=null)
        {
           //Triming last category_id 
           $last_user_id_trim=substr($last_user_id,2,6);

           //Increementing last category_id
           $increemented_user_id=$last_user_id_trim + 1;

           $user_id="UL".$increemented_user_id;

        }
        else{
            $user_id="UL10001";
        }
            
         /** Converting password to hash */
        $request['password'] = Hash::make($request->password);

        /** Creating Company */
        $company = new Company();
        $company->company_name=$company_name;
        $company->save();

        /** Getting Company Id **/
        $company_id = Company::orderBy('id', 'DESC')->value('id');


        /* $trainings = Training::find($request->category_id);

        $categories = Category::find($request->category_id);

        $companies = Company::find($company_id); */

        $user = new User();
        $user->user_id=$user_id;
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->password=$request['password'];
        $user->status="1";
        $user->save();
         $categories->users()->save($user);


        return redirect()->intended(route('UserRegistration.index'));
    }

    

}