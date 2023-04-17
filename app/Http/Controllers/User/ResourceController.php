<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;
use App\Models\Category;
use App\Models\Resource;
use App\Models\Users_training;
use App\Models\Take_quiz;
use App\Models\Quiz;
use App\Models\Vendor;
use Response;
use Redirect;
use PDF;

class ResourceController extends Controller
{
    public function index($training_id)
    {
      $resources=Resource::where('training_id',$training_id)->get();

      //Getting No of Attempts and Completed by user
      $user_id=Auth::guard('vendor')->id();
      $attempt_and_completed = Users_training::
                            where('user_id',$user_id)
                          ->where('status',1)
                          ->where('training_id',$training_id)
                          ->first();


      return view('user.resource.index',compact('resources','attempt_and_completed'));	
    }

    public function update_attempt_status($atempt)
    {
      $user_id=Auth::guard('vendor')->id();

      $user_training_id=Users_training::where('user_id',$user_id)
                        ->where('status',1) 
                        ->value('id');
      
      $attempt_and_completed=Users_training::where('user_id',$user_id)
                             ->where('status',1)
                             ->first();
    
     if($attempt_and_completed->attempt==1 && $attempt_and_completed->completed==1 )
      {
         Take_quiz::where('user_training_id',$user_training_id)->delete();
      }  

      //Updating Attempts Status
      $hello=Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['attempt'=> $atempt]);

    return redirect()->intended(route('user.trainingdetails.get_question'));

    }

    public function update_completed_status($completed)
    {

      //Updating Completion Status
      $user_id=Auth::guard('vendor')->id();
                  Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['completed'=> $completed]);


        return redirect()->intended(route('user.trainingdetails.get_question'));
    }


    public function get_question()
    {

      $user_id=Auth::guard('vendor')->id(); 
      $user_training_id=Users_training::where('user_id',$user_id)
                        ->where('status',1) 
                        ->value('id');
                    

       $question_id=Take_quiz::select('question_id')->
                                where('user_training_id',$user_training_id)
                                ->get();

     $get_seconds=Take_quiz::select('stored_seconds')->where('user_training_id',$user_training_id)->orderBy('id', 'desc')->first();

     if($get_seconds!=null)
     {
       $stored_seconds=$get_seconds->stored_seconds;
     }
     else{
        $stored_seconds=0;
     }

     $training_id=Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->value('training_id');

      if($question_id==null)
      {
        $question=Quiz::where('training_id',$training_id)->first();

      }
      else{
         $question=Quiz::where('training_id',$training_id)->whereNotin('id',$question_id)->first();
      }


      if($stored_seconds>=1800 || $question==null)
      {
        $quiz_completed=1;
      }
      else{
        $quiz_completed=0;
      }

      //Updating Complted Status 
      if($quiz_completed==1)
      {
        $no_of_question_attempted=Take_quiz::where('user_training_id',$user_training_id)->where('answer_status','right')->get();
        $question_attempted=count($no_of_question_attempted);

        Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['completed'=> "1",
                          'question_attempted'=>$question_attempted]);
      } 

      $answer=Take_quiz::where('user_training_id',$user_training_id)->where('answer_status','right')->get();
      $correct_answer=count($answer);

      $caculate_question=Quiz::where('training_id',$training_id)->get();
      $total_question=count($caculate_question);

      if($correct_answer>=2)
      {
        $passed="1";
        Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['exam_status'=> "1"]);
      }
      else{
        $passed="2";
         Users_training::where('user_id',$user_id)
                        ->where('status',1)
                        ->update(['exam_status'=> "2"]);
      }

      $quiz_attempt=Users_training::where('user_id',$user_id)->where('status',1)->value('attempt');
      $quiz_complete=Users_training::where('user_id',$user_id)->where('status',1)->value('completed');

       $user_training_id=Users_training::where('user_id',$user_id)->where('status',1)->value('id');


      return view('user.quiz.index',compact('question','stored_seconds','quiz_completed','total_question','correct_answer','passed','training_id','quiz_attempt','quiz_complete','user_training_id'));  
    }

    public function answercheck(Request $request)
    {

       $correct_answer=Quiz::where('id',$request->question_id)->value('correct_answer');
       if($request->answercheck==$correct_answer)
       {
        return response()->json(['success'=>'Corrrect Answer !','statusCode'=>'200']);
       }
       else{
        return response()->json(['failure'=>'Wrong Answer!','statusCode'=>'404']);

       }
    }

    public function answersubmit(Request $request)
    {
      $minutes = $request->minutes;
      $seconds    = $request->seconds;
      $total_seconds   = ($minutes * 60) + $seconds; 


      $user_id=Auth::guard('vendor')->id();
      $user_training_id=Users_training::where('user_id',$user_id)->where('status',1)->value('id');

      $correct_answer=Quiz::where('id',$request->question_id)->value('correct_answer');
       if($request->answer==$correct_answer)
       {
        Take_quiz::insert(['user_training_id'=> $user_training_id,
                         'question_id'=>$request->question_id,
                         'answer'=>$request->answer,
                         'answer_status'=>"right",
                         'stored_seconds'=>$total_seconds,
                       ]);
        return response()->json(['success'=>'Corrrect Answer !','statusCode'=>'200']);
       }
       else{
        Take_quiz::insert(['user_training_id'=> $user_training_id,
                         'question_id'=>$request->question_id,
                         'answer'=>$request->answer,
                         'answer_status'=>"wrong",
                         'stored_seconds'=>$total_seconds,
                       ]);
        return response()->json(['failure'=>'Wrong Answer!','statusCode'=>'404']);

       }

    }

    public function training_report($training_id)
    {
       $user_id=Auth::guard('vendor')->id();
      $user_training_id=Users_training::where('user_id',$user_id)->where('status',1)->value('id');

             $report=Take_quiz::with('quizzes')->where('user_training_id',$user_training_id)
                        ->get();


        return view('user.quiz.detailedreport',compact('report'));
    }

    public function my_trainings()
    {
       $user_id=Auth::guard('vendor')->id();
                  
       $my_trainings=Users_training::with('vendors')
                      ->with('trainings')
                      ->where('user_id',$user_id)
                        ->get();


        return view('user.quiz.my_training',compact('my_trainings'));
    }

    public function view_resource($id)
    {
      $resource=Resource::where('id',$id)->first();

        $array=array();
      
        $name=$resource->name;
        $description=$resource->description;
        $image=$resource->image;

        $array[0]=$name;
        $array[1]=$description;
        $array[2]=$image;


        return Response::json($array); 

    }

    public function gettrainingdescription($id)
    {
      $user_training_id=$id;

      $user_id=Auth::guard('vendor')->id();
                  
       $trainings_id=Users_training::where('id',$id)
                        ->value('training_id');

        $exam_status=Users_training::where('id',$id)
                        ->value('exam_status');

        $amount=Vendor::where('id',$user_id)->value('amount'); 

        $correct_answer=Users_training::where('id',$id)->value('question_attempted');
        $no_of_total_question=Quiz::where('training_id',$trainings_id)->get();
        $total_question=count($no_of_total_question);

        $trainings=Training::with('categories')->where('id',$trainings_id)->first();                

        return view('user.training.index',compact('trainings','exam_status','amount','total_question','correct_answer','user_training_id'));                
    }

    public function view_certicate($id)
    {
        $training_id=Users_training::where('id',$id)->value('training_id');
        
        $total_no_of_question=Quiz::where('training_id',$training_id)->get();
        $total_question=count($total_no_of_question);
        $correct_answer=Users_training::where('id',$id)->value('question_attempted');

        $percentage=($correct_answer/$total_question)*100;
        $round_off_percentage=round($percentage, 2);


        $users=Users_training::with('vendors')->where('id',$id)->first();

        return view('user.quiz.certificate',compact('users','round_off_percentage'));                
    }

    public function createPDF($id) {
      

      $training_id=Users_training::where('id',$id)->value('training_id');
        
        $total_no_of_question=Quiz::where('training_id',$training_id)->get();
        $total_question=count($total_no_of_question);
        $correct_answer=Users_training::where('id',$id)->value('question_attempted');

        $percentage=($correct_answer/$total_question)*100;
        $round_off_percentage=round($percentage, 2);

        $firstname_instance=Users_training::with('vendors')->where('id',$id)->first();
        $lastname_instance=Users_training::with('vendors')->where('id',$id)->first();

        $firstname=$firstname_instance->vendors->firstname;
        $lastname=$lastname_instance->vendors->lastname;

        $array=array();
        $array[0]=$firstname;
        $array[1]=$lastname;
        $array[2]=$round_off_percentage;


      // share data to view
      view()->share('user.quiz.downloadcertificate',$array);
      $pdf = PDF::loadView('user.quiz.downloadcertificate', compact('array'));

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    
}
