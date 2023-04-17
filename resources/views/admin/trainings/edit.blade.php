@extends('admin.layouts.appsidebartrainings')

@section('content')

<div class="app-content content dashboard">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-dashboard">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="trainings.php"><h2 class="mb-0"><i class="fas fa-angle-left"></i> Training Details</h2></a>
                                                <div class="printer-icon"><button class="border-0 p-0 rounded-circle"><img src="images/printer.png" alt="" class="img-fluid"></button></div>
                                            </div>
                                            <div class="d-flex align-items-center mt-5 justify-content-between">
                                                <p class="grey-text">T ID: {{$trainings->training_id}}</p>
                                                <div class="d-flex align-items-center">
                                                    <p class="grey-text mr-1 p-md">Status</p>
                                                     @if($trainings->status=="1")
                                                    <p class="active-tag">Active</p>
                                                    @else
                                                    <p class="active-tag">In Active</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="{{ route('trainings.update', $trainings->id) }}" enctype="multipart/form-data">
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-xl-6 mt-1 order-2 order-lg-1 col-lg-8">
                                                <div class="row align-items-center">
                                                    

                                                    <div class="col-sm-6 text-center text-sm-left"><p class="l-grey-text mb-0">Training Name * </p></div>
                                                    <div class="col-sm-6 text-center text-sm-left"><input name="training_name" type="text" value="{{$trainings->training_name}}" class="site-input grey-text" required></div>
                                                    
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">Training Category</p></div>
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left">
                                                     <select name="category_id" id="category_id" class="site-input">
                                                     @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $trainings->categories->id ? 'selected' : ''}} >{{$category->category_name}}</option>
                                                     @endforeach
                                                     </select>
                                                     </div>
                                                    
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">Passing Percentage * </p></div>
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><input name="pass_percentage" type="text" value="{{$trainings->pass_percentage}}" class="site-input grey-text" required></div>
                                                
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <p class="l-grey-text">Image</p>
                                        </div>
                                       
                                        <div class="col-xl-3 col-lg-4 mt-1 col-md-6">
                                             <div class="d-flex">
                                <input style="height:100px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" id="image" type="file" name="training_image" accept="image/*" onchange="readURL1(this);" />
                                <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                <input type="hidden" name="hidden_image" id="hidden_image" >
                                <img src="{{ asset('app-assets/images/trainings/'.$trainings->image)}}" style="padding-left:20px;border-style: hidden;" id="modal-preview1"   width="220" height="190" alt="">
                            
                        <div class="position-relative">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle" onclick="remove_image1()"></i></span>
                        </div>
                    </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 mt-2">
                                            <p class="l-grey-text">Description * </p>
                                        </div>
                                        <div class="col-lg-8 col-xl-9 mt-0 mt-lg-2 text-center text-sm-left">
                                            <textarea class="grey-text site-input" name="description" rows="4" value="{{$trainings->description}}" required>{{$trainings->description}}</textarea>
                                        </div>

                                        <div class="col-sm-6 text-center text-sm-left"><p class="l-grey-text mb-0">Training Amount * </p></div>
                                        <div class="col-sm-6 text-center text-sm-left"><input name="amount" type="number" value="{{$trainings->amount}}" class="site-input grey-text" required></div>
                                                    

                                        @if($trainings->status=="1")
                                        <div class="col-xl-3 col-md-6 mt-1">
                                            <p class="l-grey-text mb-0 mr-4 mt-2">
                                                <input type="checkbox" id="stopover" name="radio_group" checked>
                                                <label for="stopover" class="bordered mb-0"> Active</label>
                                            </p>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6 mt-1">
                                            <p class="l-grey-text mb-0 mr-4 mt-2">
                                                <input type="checkbox" id="stopover" name="radio_group">
                                                <label for="stopover" class="bordered mb-0">In Active</label>
                                            </p>
                                        </div>
                                        @endif

                                        <input type="hidden" name="id" value = "{{$trainings->id}}">

                                        <div class=" col-xl-2 col-md-6 mt-2">
                                        <button class="site-btn d-inline-block px-3" type="submit">Update</button>
                                        </form>
                                        </div>

                                    </form>
                                      

                                        <div class="col-xl-3 col-md-6 mt-2">
                                            <form action="{{route('quiz.index',$trainings->id)}}">
                                             @csrf
                                             <button type="submit" class="login-btn mr-xl-1 px-2">Quiz Management</a>
                                            </form>
                                        </div>
                                        
                                        <div class="col-xl-2 col-md-6 mt-2">
                                            <a href="#_" data-toggle="modal" data-target=".addResource" class="site-btn d-inline-block px-2" >Add Resource</a>
                                        </div>
                                        <div class="col-xl-1 col-md-6 mt-2">
                                        <form action="{{route('quiz.report',$trainings->id)}}">
                                             @csrf
                                             <button type="submit" class="site-btn mr-xl-1 px-2">Quiz Report</a>
                                        </form>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="resource-card pt-2 pb-4 pl-md-3 pl-1 pr-1">
                                                <h2>Resource</h2>
                                              @foreach($resources as $resource)
                                                <div class="mt-3">
                                                    <div class="resource-inner-card mr-2 py-3">
                                                        <div class="row">
                                                            <div class="col-xl-4 text-center my-auto">
                                                                <img src="{{asset('app-assets/images/resources/'.$resource->image)}}" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="col-xl-8 mt-2">
                                                                <div class="d-md-flex align-items-center justify-content-between">
                                                                    <h5>Descriptions</h5>
                                                                    <div class="d-flex justify-content-between justify-content-md-left mt-1 mt-md-0">
                                                                        <h6 class="green-text mb-0">Resource Name: {{$resource->name}}</h6>
                                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                                            <form method="post">
                                                                             @csrf   
                                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                                 <a class="dropdown-item" data-toggle="modal" id="edit-resource"data-target=".editResource" data-id="{{ $resource->id }}" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                                                                                <a href="{{ url('admin/resourcedelete/'.$resource->id)}}" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                                                            </div>
                                                                           </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="l-grey-text mt-1">{{$resource->description}}</p>
                                                                <div class="mt-2">
                                                                    <a href="#_" class="site-btn px-5">View</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



<div class="modal fade addResource" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                 <form  method="post" action="{{ route('resources.store') }}" enctype="multipart/form-data">
                 @csrf
                    <p class="modal-heading text-center">Add Resource</p>
                    <input name="name" type="text" placeholder="Resource Name * "  class="site-input mb-2" required>
                    <textarea name="description"  cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description * " required></textarea>
                    <p class="mt-2 black-text mb-0">Upload Media *:</p>
                    <div class="d-flex">
                                 <input style="height:200px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" name="image" type="file" value="upload" onchange="readURL2(this);" required/>
                                 <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                <img style="padding-left:20px;border-style: hidden;" id="modal-preview2" class="hidden"  width="220" height="190" alt="">                        
                        <div class="position-relative">
                            <img src="images/training-details.png" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle" onclick="remove_image2()"></i></span>
                        </div>
                    </div>
                    <input type="hidden" name="id" value = "{{$trainings->id}}">

                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="login-btn px-5" >Add Resource</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade editResource" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                <form  method="post" action="{{ route('resources.update') }}" enctype="multipart/form-data">
                 @csrf
                    <input type="hidden" name="training_id" value = "{{$trainings->id}}">
                    <input type="hidden" name="id" id="id">

                    <p class="modal-heading text-center">Edit Resource</p>
                    <input name="name" id="name" type="text" placeholder="Resource Name * "  class="site-input mb-2" required>
                    <textarea name="description" id="description" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description * " required></textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                      <input style="height:100px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" id="image" type="file" name="image" accept="image/*" onchange="readURL3(this);" />
                                <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                                <img style="padding-left:20px;" id="modal-preview3"  src="" width="220" height="190" alt="">
                                <img style="padding-left:20px;border-style: hidden;" id="modal-preview3" class="hidden"  width="220" height="190" alt="">
                        <div class="position-relative">
                            <img src="images/training-details.png" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle" onclick="remove_image3()"></i></span>
                        </div>
                    </div>

                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="login-btn px-5" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  $('body').on('click', '#edit-resource', function () {
var resource_id = $(this).data('id');
$.get('/hipaa/admin/resourceedit/'+resource_id+'/edit', function (data) {
$('#customerCrudModal').html("Edit customer");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#id').val(data.id);
$('#name').val(data.name);
$('#description').val(data.description);
$('#modal-preview3').attr('alt', 'No image available');
$('#modal-preview3').attr('src', '{{asset("app-assets/images/resources")}}/'+data.image);
$('#hidden_image').attr('src', '{{asset("app-assets/images/resources")}}/'+data.image);
})
});

function readURL1(input, id) {
id = id || '#modal-preview1';
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$(id).attr('src', e.target.result);
};
reader.readAsDataURL(input.files[0]);
$('#modal-preview1').removeClass('hidden');
$('#start').hide();
}
}

function readURL3(input, id) {
id = id || '#modal-preview3';
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$(id).attr('src', e.target.result);
};
reader.readAsDataURL(input.files[0]);
$('#modal-preview3').removeClass('hidden');
$('#start').hide();
}
}

function readURL2(input, id) {
id = id || '#modal-preview2';
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$(id).attr('src', e.target.result);
};
reader.readAsDataURL(input.files[0]);
$('#modal-preview2').removeClass('hidden');
$('#start').hide();
}
}

function remove_image1(){
    document.getElementById('modal-preview1').removeAttribute('src');
    $('#modal-preview1').addClass('hidden');
}

function remove_image2(){
    document.getElementById('modal-preview2').removeAttribute('src');
    $('#modal-preview2').addClass('hidden');
}

function remove_image3(){
    document.getElementById('modal-preview3').removeAttribute('src');
    $('#modal-preview3').addClass('hidden');
}

</script>


@endsection
