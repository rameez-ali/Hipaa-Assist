<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Category;
use App\Models\Resource;
use Response;

class ResourceController extends Controller
{
    public function store(Request $request)
    {
    	
        $request->validate([
            'name'     => 'required',
            'description'     => 'required',
        ]);

        $resource_image = $request->file('image');
        $image = rand() . '.' . $resource_image->getClientOriginalExtension();
        $resource_image->move(public_path('app-assets/images/resources'), $image);

        $trainings = Training::find($request->id);
        
        $resource = new Resource();
        $resource->name=$request->name;
        $resource->description=$request->description;
        $resource->image=$image;

        $trainings->resources()->save($resource);

        $id=$request->id;

        return redirect()->route('trainings.display', ['id' => $id])->with('resourceaddsuccess','Resource Added Successfully');
    }

    public function delete($id){
        $training_id=Resource::where('id',$id)->value('training_id');
        $resource=Resource::find($id);
        $resource->delete();


         return redirect()->route('trainings.display', ['id' => $training_id])->with('resourcedelsuccess','Resource Deleted Successfully');

        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $resources = Resource::where($where)->first();


        return Response::json($resources);
    }


    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');

        $resources = Resource::find($request->id);

        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'description'    =>  'required',
                'image' =>       'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('app-assets/images/resources'), $image_name);

            $resources->image=$image_name;
            $resources->name=$request->name;
            $resources->description=$request->description;
            $resources->update();

        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'description'    =>  'required'
            ]);

            $resources->description=$request->description;
            $resources->update();

        }

         return redirect()->route('trainings.display', ['id' => $request->training_id])->with('resourceupdatesuccess','Resource Updated Successfully');
    }


    
}
