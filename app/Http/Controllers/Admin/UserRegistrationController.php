<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Company;
use App\Models\Training;
use App\Models\Users_training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Carbon\Carbon;
use Crypt;


class UserRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function index()
    {
        $categories=Category::all();
        $trainings=Training::all();
        $companies=Company::all();

        $vendors=Vendor::with('companies')->with('trainings')->get();
      
        return view('admin.userregistrations.index',compact('categories','trainings','vendors','companies'));
    }

    public function store(Request $request)
    {
         $date = Carbon::now();

         $request->validate([
            'firstname'     => 'required',
            'lastname'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
            'category_id'     => 'required',
            'training_id'     => 'required'
        ]);

        //Getiing last category_id in form of collection
        $last_user_id = Vendor::orderBy('id', 'DESC')->value('user_id');

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
        
        $plain_password=$request->password;

         /** Encrypting password  */
       if($request->password==$request->confirm_password){
             $request['password'] = Hash::make($request->password);
        }
        else{
            return redirect()->intended(route('userregistration.index'))->with('incorrectpasswordcreatesuccess','user');
        }


        /** Saving Record in Vendors **/
        $vendor = new Vendor();
        $vendor->user_id=$user_id;
        $vendor->firstname=$request->firstname;
        $vendor->lastname=$request->lastname;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->password=$request['password'];
        $vendor->plain_password=$plain_password;
        $vendor->status="1";
        $vendor->date=$date->toDateString();
        $vendor->category_id = $request->category_id;
        $vendor->training_id = $request->training_id;
        $vendor->company_id = $request->company_id;
        $vendor->amount = $request->amount;
        $vendor->save();

        $vendors=Vendor::where('company_id', $request->company_id)->get();
        $no_of_employees = count($vendors);
        $company = Company::find($request->company_id);
        $company->employees=$no_of_employees;
        $company->update();

        $user_id = Vendor::orderBy('id', 'DESC')->value('id');

        $users_trainings =new Users_training();
        $users_trainings->user_id = $user_id;
        $users_trainings->training_id = $request->training_id;
        $users_trainings->category_id = $request->category_id;
        $users_trainings->status = "1";
        $users_trainings->date=$date->toDateString();
        $users_trainings->save();

        return redirect()->intended(route('userregistration.index'))->with('useraddsuccess','user');
    }

    public function update(Request $request)
    {
      $date = Carbon::now();

         $request->validate([
            'firstname'     => 'required',
            'lastname'     => 'required',
            'email'     => 'required',
            'category_id_edit'     => 'required',
            'training_id_edit'     => 'required'
        ]);
           
        $plain_password=$request->password;
            
         /** Encrypting password  */
        if($request->password==$request->password_confirmation){
             $request['password'] = Hash::make($request->password);
        }
        else{
            return redirect()->intended(route('userregistration.index'))->with('incorrectpasswordupdatesuccess','user');
        }


        /** Saving Record in Vendors **/
        $vendor = Vendor::find($request->id);
    

       
        $vendor->firstname=$request->firstname;
        $vendor->lastname=$request->lastname;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->password=$request['password'];
        $vendor->plain_password=$plain_password;
        $vendor->status="1";
        $vendor->category_id = $request->category_id_edit;
        $vendor->training_id = $request->training_id_edit;
        $vendor->company_id = $request->company_id_edit;
        $vendor->amount = $request->amount;
        $vendor->update();

        $vendors=Vendor::where('company_id', $request->company_id_edit)->get();
        $no_of_employees = count($vendors);
        $company = Company::find($request->company_id_edit);
        $company->employees=$no_of_employees;
        $company->update();

        //Make all Previous Trainings Inactivated
        Users_training::where('user_id',$request->id)->update(['status'=> 0]);

        //Make this latest Training Activated 
        $users_trainings =new Users_training();
        $users_trainings->user_id = $request->id;
        $users_trainings->training_id = $request->training_id_edit;
        $users_trainings->category_id = $request->category_id_edit;
        $users_trainings->status = "1";
        $users_trainings->date=$date->toDateString();          
        $users_trainings->save();
          
          return redirect()->intended(route('userregistration.index'))->with('userupdatesuccess','user');


        
    }

    public function display($id)
    {
      $vendors = Vendor::with('categories')
                  ->with('trainings')
                  ->with('companies')
                  ->where('id',$id)
                  ->first();

      return view('admin.userregistrations.details',compact('vendors'));
    }

    public function statusupdateactive(Request $request)
    {  
        $vendors = Vendor::find($request->id);
        $vendors->status=$request->status;
        $vendors->update();

        $make_user_active_inactive = array(
          'status'       =>  $request->status
       );

       Users_training::where('user_id',$request->id)->update($make_user_active_inactive);

        return redirect()->intended(route('userregistration.index'))->with('useractivesuccess','user');

    }

    public function statusupdateinactive(Request $request)
    {  
        $vendors = Vendor::find($request->id);
        $vendors->status=$request->status;
        $vendors->update();

        $make_user_active_inactive = array(
          'status'       =>  $request->status
       );

       Users_training::where('user_id',$request->id)->update($make_user_active_inactive);

        return redirect()->intended(route('userregistration.index'))->with('userinactivesuccess','user');

    }
    public function edit($id)
    {
        $vendors=Vendor::where('id',$id)->first();

        $array=array();
      

        $vendors_id=$vendors->id;
        $vendors_firstname=$vendors->firstname;
        $vendors_lastname=$vendors->lastname;
        $vendors_email=$vendors->email;
        $decrypted_password = $vendors->plain_password;
        $vendors_phone=$vendors->phone;
        $vendors_amount=$vendors->amount;

        $array[0]=$vendors_id;
        $array[1]=$vendors_firstname;
        $array[2]=$vendors_lastname;
        $array[3]=$vendors_email;
        $array[4]=$vendors_phone;
        $array[5]=$decrypted_password;
        $array[6]=$vendors_amount;


        return Response::json($array);
    }

    public function getcompaniesedit($id)
    {

        $vendor_companies=Company::select('company_name','id')->where('category_id',$id)->get();

        return Response::json($vendor_companies);


    }

    public function gettrainingsedit($id)
    {

        $vendor_trainings=Training::select('training_name','id')->where('category_id',$id)->get();

        return Response::json($vendor_trainings);


    }

    public function getcategories($id)
    {
        $vendor_category_id = Vendor::where('id', $id)->value('category_id');

        $vendor_categories=Category::select('category_name','id')->where('id',$vendor_category_id)->get();

        $categories=Category::select('category_name','id')->where('id','!=',$vendor_category_id)->get();


        $new_vendor_categories = collect($vendor_categories);
        $new_categories = collect($categories);

        $merged_categories = $new_vendor_categories->merge($new_categories);

        return Response::json($merged_categories);

    }

    public function getcompanies($id)
    {
        $vendor_category_id = Vendor::where('id', $id)->value('category_id');

        $vendor_companies=Company::select('company_name','id')->where('category_id',$vendor_category_id)->get();

        return Response::json($vendor_companies);

    }

    public function gettrainings($id)
    {
        $vendor_category_id = Vendor::where('id', $id)->value('category_id');

        $vendor_companies=Training::select('training_name','id')->where('category_id',$vendor_category_id)->get();

        return Response::json($vendor_companies);

    }

   public function getfilterecords(Request $request){


         $company_ids = Vendor::select('company_id')->orwhere('company_id', $request->company_id)
                         ->orwhere('status',$request->status_id)  
                         ->get();

         $training_ids = Vendor::select('training_id')->orwhere('company_id', $request->company_id)
                         ->orwhere('status',$request->status_id)  
                         ->get();

         $category_ids = Vendor::select('category_id')->orwhere('company_id', $request->company_id)
                         ->orwhere('status',$request->status_id)  
                         ->get();

                         dd($request);

         if($request->company_id=="0" && $request->status_id!="0"){
         $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->get();
          }
          else if($request->status_id=="0" && $request->company_id!="0"){
            $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->get();

          }
          else if($request->company_id!="0" && $request->status_id!="0"){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->where('vendors.status',$request->status_id)
                ->get();

          }
          else if($request->company_id=="0" && $request->status_id=="0"){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->get();
          }          
         
        return response()->json($vendors);
    }

    public function getstatusrecords(Request $request){
        
         $company_ids = Vendor::select('company_id')->where('status', $request->status_id)->get();

         $training_ids = Vendor::select('training_id')->where('status', $request->status_id)->get();

         $category_ids = Vendor::select('category_id')->where('status', $request->status_id)->get();

        $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->get();
                
                if(isset($vendors)){
                    return response()->json($vendors);
                }
                else{
                    
                }
    }

    public function getdatedrecords(Request $request)
    {
         $company_ids = Vendor::select('company_id')->where('status', $request->status_id)->get();

         $training_ids = Vendor::select('training_id')->where('status', $request->status_id)->get();

         $category_ids = Vendor::select('category_id')->where('status', $request->status_id)->get();


       if($request->company_id=="0" && $request->status_id=="0"&& $request->datefrom!=null  && $request->dateto==null  ){
         $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                 ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();
          }
          else if($request->company_id=="0" && $request->status_id=="0" && $request->date_from!=null  && $request->date_to!=null  ){
            $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id!="0" && $request->date_from==null  && $request->date_to==null  ){
            $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id=="0" && $request->date_from!=null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id!="0" && $request->date_from!=null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                 ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();
          }
          else if($request->company_id=="0" && $request->status_id!="0" && $request->date_from!=null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id=="0" && $request->date_from!=null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id!="0" && $request->date_from!=null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id!="0" && $request->date_from!=null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id=="0" && $request->date_from==null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id=="0" && $request->date_from==null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id!="0" && $request->date_from==null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id!="0" && $request->date_from==null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id=="0" && $request->date_from==null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                 ->where('company_id',$request->company_id)
                ->get();

          }    
          else if($request->company_id!="0" && $request->status_id!="0" && $request->date_from==null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->where('vendors.status',$request->status_id)
                ->get();


          }
          else if($request->company_id!="0" && $request->status_id!="0" && $request->date_from!=null && $request->date_to!=null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->where('company_id',$request->company_id)
                ->where('vendors.status',$request->status_id)
                ->whereBetween('date', array($request->date_from, $request->date_to))
                ->get();


          }
          else if($request->company_id=="0" && $request->status_id=="0" && $request->date_from==null && $request->date_to==null){
              $vendors = Vendor::
                leftjoin('categories', 'categories.id', '=', 'vendors.category_id')
                ->leftjoin('trainings', 'trainings.id', '=', 'vendors.training_id')
                ->leftjoin('companies', 'companies.id', '=', 'vendors.company_id')
                ->leftjoin('statuses', 'statuses.status', '=', 'vendors.status')
                ->select('vendors.*','vendors.id','categories.category_name','companies.company_name','trainings.training_name','statuses.status_name')
                ->get();


          }
             return response()->json($vendors);

    }

    public function getusertrainingslogs($id)
    {
      $users_trainings =  Users_training::
                where('users_trainings.user_id', '=', $id)
               ->join('vendors', 'vendors.id', '=', 'users_trainings.user_id')
               ->join('trainings', 'trainings.id', '=', 'users_trainings.training_id')
               ->join('categories', 'categories.id', '=', 'users_trainings.category_id')
            ->select('categories.category_name','trainings.training_name','trainings.id as training_id','vendors.user_id','users_trainings.id','users_trainings.status')
            ->get();


          return view('admin.userregistrations.trainingsdetails',compact('users_trainings'));
    }

    public function getusertrainingsdetails($id)
    {
      $trainings = Training::with('categories')->where('id',$id)->first();

      return view('userregistrations.trainingslogdetails',compact('trainings'));
    }

    public function getlogsfilterrecords(Request $request){
         
      if($request->date_from!=null && $request->date_to!=null){
        
        $users_trainings =  Users_training::
        leftjoin('vendors', 'vendors.id', '=', 'users_trainings.user_id')
       ->leftjoin('trainings', 'trainings.id', '=', 'users_trainings.training_id')
       ->leftjoin('categories', 'categories.id', '=', 'users_trainings.category_id')
       ->leftjoin('statuses', 'statuses.status', '=', 'users_trainings.status')
       ->select('categories.category_name','trainings.training_name','statuses.status_name','trainings.id as training_id','vendors.user_id','users_trainings.id','users_trainings.status','users_trainings.date')
       ->whereBetween('users_trainings.date', array($request->date_from, $request->date_to))
       ->get();
    }
    return response()->json($users_trainings);
  }

}
