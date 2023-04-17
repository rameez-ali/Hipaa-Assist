<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Training;

class HomeController extends Controller
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
   public function index()
    {
        $users=Vendor::all();
        $trainings=Training::all();

        $userscount = count($users);
        $trainingscount = count($trainings);

        return view('admin.dashboard',compact('users','userscount','trainingscount'));
    }

    public function handleAdmin()
    {
        return view('admin.dashboard');
    }
}
