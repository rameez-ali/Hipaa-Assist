<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function store(Request $request)
    {  
        $request->validate([
            'category_name'     => 'required'
        ]);

        //Getiing last category_id in form of collection
        $last_category_id = Category::orderBy('id', 'DESC')->value('category_id');

        if($last_category_id!=null)
        {
           //Triming last category_id 
           $last_category_id_trim=substr($last_category_id,2,6);

           //Increementing last category_id
           $increemented_category_id=$last_category_id_trim + 1;

           $category_id="AL".$increemented_category_id;

        }
        else{
            $category_id="AL10001";
        }
            
        $category_id = $category_id;

        $categories = new Category();
        $categories->category_id=$category_id;
        $categories->category_name=$request->category_name;
        $categories->status="1";
        $categories->save();

        return redirect('admin/categories')->with('cataddsuccess','Category Added Successfully');

    }

    public function statusupdateactive(Request $request)
    {  
        $categories = Category::find($request->id);
        $categories->status=$request->status;
        $categories->update();

        return redirect('admin/categories')->with('catactivesuccess','Category Activated Successfully');

    }

    public function statusupdateinactive(Request $request)
    {  
        $categories = Category::find($request->id);
        $categories->status=$request->status;
        $categories->update();

        return redirect('admin/categories')->with('catinactivesuccess','Category Inactivated Successfully');

    }
}
