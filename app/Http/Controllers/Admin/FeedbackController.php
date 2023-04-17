<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
   public function index(){

        $feedbacks=Feedback::with('vendors')
                  ->with('categories')
                  ->with('trainings')
                  ->with('companies')                  
                  ->get();
                  
        return view('admin.feedback.index',compact('feedbacks'));
    }

    public function display($id)
    {
      $feedback = Feedback::with('vendors')
                  ->with('categories')
                  ->with('trainings')
                  ->with('companies')                  
                  ->where('id',$id)
                  ->first();
                  
      return view('admin.feedback.details',compact('feedback'));
    }
}
