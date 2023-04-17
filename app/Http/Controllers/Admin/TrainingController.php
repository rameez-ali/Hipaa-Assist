<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Category;
use App\Models\Resource;
use App\Models\Company;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $trainings = Training::with('categories')->get();
        $companies = Company::get();
        return View('admin.trainings.index',compact('trainings','companies')); 
    }

    public function create()
    {
         //Getiing last training_id in form of collection
         $last_training_id = Training::orderBy('id', 'DESC')->value('training_id');

         if($last_training_id!=null)
         {
            //Triming last training_id 
            $last_training_id_trim=substr($last_training_id,2,6);
 
            //Increementing last training_id
            $increemented_training_id=$last_training_id_trim + 1;

            $training_id="TL".$increemented_training_id;
 
         }
         else{
            $training_id="TL10001";
         }

        $categories=Category::where('status',1)->get();
        
        return view('admin.trainings.create',compact('training_id','categories'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'training_id'     => 'required',
            'training_name'     => 'required',
            'pass_percentage'     => 'required',
            'description'     => 'required',
        ]);

        $training_image = $request->file('image');
        $image = rand() . '.' . $training_image->getClientOriginalExtension();
        $training_image->move(public_path('app-assets/images/trainings'), $image);

        $categories = Category::find($request->category_id);
        
        $training = new Training();
        $training->training_id=$request->training_id;
        $training->training_name=$request->training_name;
        $training->pass_percentage=$request->pass_percentage;
        $training->description=$request->description;
        $training->image=$image;
        $training->amount=$request->amount;
        $training->status="1";

        $categories->trainings()->save($training);

        return redirect('admin/trainings')->with('trainingaddsuccess','Training Added Successfully');

    }

    public function display($id)
    {
      $trainings = Training::with('categories')->where('id',$id)->first();
      $resources = Resource::where('training_id',$id)->get();
      return view('admin.trainings.details',compact('trainings','resources'));
    }

    public function edit($id)
    {
      $trainings = Training::with('categories')->where('id',$id)->first();
      $categories=Category::all();
      $resources = Resource::where('training_id',$id)->get();
      return view('admin.trainings.edit',compact('trainings','categories','resources'));
    }

    public function update(Request $request){

        if(isset($request->radio_group))
        {
            $request['status']="1";
        }
        else{
            $request['status']="0";
        }

       
        $training_image = $request->file('training_image');
        
        if($training_image != '')
        {
            $request->validate([
                'training_name'     => 'required',
                'pass_percentage'     => 'required',
                'description'     => 'required',
                
            ]);

            $request['image'] = rand() . '.' . $training_image->getClientOriginalExtension();
            $training_image->move(public_path('app-assets/images/trainings'), $request['image']);
        }
        else
        {
            $request->validate([
                'training_name'     => 'required',
                'pass_percentage'     => 'required',
                'description'     => 'required',
                'category_id'     => 'required',
            ]);
        }

        $training = Training::find($request->id);
        $input = $request->all();
        $training->fill($input)->save();
        
         return redirect()->route('trainings.display', ['id' => $request->id])->with('trainingupdatesuccess','Training Updated Successfully');  
    }
}
