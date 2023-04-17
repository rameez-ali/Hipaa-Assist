<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Quiz;
use App\Models\Quiz_attempt;
use Response;


class QuizController extends Controller
{
    
    public function index(Request $request, $id)
    {
    	  
        $training_id=$id;

        $quizes=Quiz::where('training_id',$training_id)->get();

        $last_question_number = Quiz::orderBy('id', 'DESC')->value('question_number');

        if($last_question_number!=null)
        {
           //Triming last category_id 
           $last_question_number_trim=substr($last_question_number,1,2);

           //Increementing last category_id
           $increemented_question_number=$last_question_number_trim + 1;

           $question_number="Q".$increemented_question_number;

        }
        else{
            $question_number="Q1";
        }

    	return view('quizes.index',compact('training_id','question_number','quizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question'     => 'required',
            'option1'     => 'required',
            'option2'     => 'required',
            'option3'     => 'required',
            'option4'     => 'required',
        ]);

        if($request->radio_group=="1"){
           $correct_answer=$request->option1;
        }
        else if ($request->radio_group=="2"){
           $correct_answer=$request->option2;
        }
        else if ($request->radio_group=="3"){
           $correct_answer=$request->option3;
        }
        else{
           $correct_answer=$request->option4;
        }

        $last_question_number = Quiz::orderBy('id', 'DESC')->value('question_number');

        if($last_question_number!=null)
        {
           //Triming last category_id 
           $last_question_number_trim=substr($last_question_number,1,2);

           //Increementing last category_id
           $increemented_question_number=$last_question_number_trim + 1;

           $question_number="Q".$increemented_question_number;

        }
        else{
            $question_number="Q1";
        }


        $quiz_image = $request->file('image');
        $image = rand() . '.' . $quiz_image->getClientOriginalExtension();
        $quiz_image->move(public_path('app-assets/images/quizes'), $image);

        $trainings = Training::find($request->training_id);
        
        $quizes = new Quiz();
        $quizes->question_number=$question_number;
        $quizes->question=$request->question;
        $quizes->image=$image;
        $quizes->option1=$request->option1;
        $quizes->option2=$request->option2;
        $quizes->option3=$request->option3;
        $quizes->option4=$request->option4;
        $quizes->correct_answer=$correct_answer;

        $trainings->quizes()->save($quizes);

        $id=$request->training_id;

         return redirect()->route('quiz.index', ['id' => $id])->with('questionaddsuccess','Question Added Successfully');

    }

    public function delete($id){
        $training_id=Quiz::where('id',$id)->value('training_id');
        $quiz=Quiz::find($id);
        $quiz->delete();


         return redirect()->route('quiz.index', ['id' => $training_id])->with('questiondelsuccess','Question Deleted Successfully');

        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $quizes = Quiz::where($where)->first();


        return Response::json($quizes);
    }

    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($request->radio_group=="1"){
           $correct_answer=$request->option1;
        }
        else if ($request->radio_group=="2"){
           $correct_answer=$request->option2;
        }
        else if ($request->radio_group=="3"){
           $correct_answer=$request->option3;
        }
        else{
           $correct_answer=$request->option4;
        }

        $quizes = Quiz::find($request->id);

        if($image != '')
        {
            $request->validate([
                'question'    =>  'required',
                'option1'     =>  'required',
                'option2'    =>  'required',
                'option3'     =>  'required',
                'option4'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('app-assets/images/quizes'), $image_name);

            $quizes->question=$request->question;
            $quizes->image=$image_name;
            $quizes->option1=$request->option1;
            $quizes->option2=$request->option2;
            $quizes->option3=$request->option3;
            $quizes->option4=$request->option4;
            $quizes->correct_answer=$correct_answer;
            $quizes->update();

        }
        else
        {
            $request->validate([
                'question'    =>  'required',
                'option1'     =>  'required',
                'option2'    =>  'required',
                'option3'     =>  'required',
                'option4'     =>  'required',
            ]);

            $quizes->question=$request->question;
            $quizes->option1=$request->option1;
            $quizes->option2=$request->option2;
            $quizes->option3=$request->option3;
            $quizes->option4=$request->option4;
            $quizes->correct_answer=$correct_answer;
            $quizes->update();
        }

         return redirect()->route('quiz.index', ['id' => $request->training_id])->with('questionupdatesuccess','Question Updated Successfully');
    }

    public function report($id){
        
        $no_of_question_againts_training=Quiz::select('question_number','correct_answer','training_id')->where('training_id',$id)->get()->toArray();
 
        
        $no_of_attempts_againts_training=Quiz_attempt::select('id','training_id','correct_answer','question_number')->wherein('question_number',$no_of_question_againts_training)
                                                        // ->wherein('correct_answer',$no_of_question_againts_training)
                                                        // ->wherein('training_id',$no_of_question_againts_training)
                                                        ->get();
        

        return view('quizes.report',compact('no_of_attempts_againts_training'));

    }

}
