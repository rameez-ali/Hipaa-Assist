<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Training;
use App\Models\Users_training;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
  public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function index(Request $request )
    {
        $user_id=Auth::guard('vendor')->id();

        $user=Vendor::with('trainings')->where('id',$user_id)->first();

        $payment_status = Users_training::
                            where('user_id',$user_id)
                          ->where('training_id',$user->training_id)
                          ->where('status',1)
                          ->value('payment_status');

        return view('user.dashboard',compact('user','payment_status'));
    }

     public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
