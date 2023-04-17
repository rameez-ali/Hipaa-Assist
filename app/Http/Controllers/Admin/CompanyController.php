<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Vendor;
use App\Models\Category;

class CompanyController extends Controller
{
    public function index(){
        $companies=Company::select('id','company_name','employees')->get();
        $categories=Category::select('id','category_name')->get();
        return view('admin.companies.index',compact('companies','categories'));

    }

    public function store(Request $request){
         
        $request->validate([
            'company_name'     => 'required'
        ]);
        
        $company = new Company();
        $company->company_name=$request->company_name;
        $company->category_id=$request->category_id;
        $company->employees="0";
        $company->save();
        
        return redirect('admin/companies')->with('companyaddsuccess','Company Added Successfully');
        
    }

    public function display($id){
        
        $companies=Company::where('id',$id)->first();
        $vendors=Vendor::where('company_id',$id)->get();

        return view('admin.companies.details',compact('companies','vendors'));

    }
}
