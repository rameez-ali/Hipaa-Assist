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
                                                    

                                                    <div class="col-sm-6 text-center text-sm-left"><p class="l-grey-text mb-0">Training Name</p></div>
                                                    <div class="col-sm-6 text-center text-sm-left"><input name="training_name" type="text" value="{{$trainings->training_name}}" class="site-input grey-text"></div>
                                                    
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">Training Category</p></div>
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left">
                                                     <select name="category_id" id="category_id" class="site-input">
                                                     @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $trainings->categories->id ? 'selected' : ''}} >{{$category->category_name}}</option>
                                                     @endforeach
                                                     </select>
                                                     </div>
                                                    
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">Passing Percentage</p></div>
                                                    <div class="col-sm-6 mt-1 text-center text-sm-left"><input name="pass_percentage" type="text" value="{{$trainings->pass_percentage}}" class="site-input grey-text"></div>
                                                
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <p class="l-grey-text">Image</p>
                                        </div>
                                        <div class="col-xl-3 col-lg-5 mt-1 col-md-6">
                                            <div class="position-relative">
                                                <img src="{{ asset('app-assets/images/trainings/'.$trainings->image)}}" alt="" class="img-fluid w-100">
                                                <button class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 mt-1 col-md-6">
                                            
                                                <div class="b1" onclick="getFile()">
                                                    <input style="height:200px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" name="image" type="file" value="upload" />
                                                        <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                                          <input type="hidden" name="training_hidden_image" value="{{ $trainings->image }}" />
                                                    </div>
                                                <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
                                            

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 mt-2">
                                            <p class="l-grey-text">Description</p>
                                        </div>
                                        <div class="col-lg-8 col-xl-9 mt-0 mt-lg-2 text-center text-sm-left">
                                            <textarea class="grey-text site-input" name="description" rows="4" value="{{$trainings->description}}">{{$trainings->description}}
                                            </textarea>
                                        </div>

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
                                      

                                        <div class="col-xl-2 col-md-6 mt-2">
                                            <a href="create-quiz.php" class="site-btn d-inline-block px-2" >Quiz Management</a>
                                        </div>
                                        <div class="col-xl-2 col-md-6 mt-2">
                                            <a href="#_" data-toggle="modal" data-target=".addResource" class="site-btn d-inline-block px-2" >Add Resource</a>
                                        </div>
                                        <div class="col-xl-1 col-md-6 mt-2">
                                            <a href="quiz-report.php" class="site-btn d-inline-block px-3" >Quiz Report</a>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="resource-card pt-2 pb-4 pl-md-3 pl-1 pr-1">
                                                <h2>Resource</h2>
                                              @foreach($resources as $resource)
                                                <div class="mt-3">
                                                    <div class="resource-inner-card mr-2 py-3">
                                                        <div class="row">
                                                            <div class="col-xl-4 text-center my-auto">
                                                                <img src="images/video.png" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="col-xl-8 mt-2">
                                                                <div class="d-md-flex align-items-center justify-content-between">
                                                                    <h5>Descriptions</h5>
                                                                    <div class="d-flex justify-content-between justify-content-md-left mt-1 mt-md-0">
                                                                        <h6 class="green-text mb-0">Resource Name: {{$resource->resource_name}}</h6>
                                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                                <a href="#_" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                                                                                <a href="#_" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                                                            </div>
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

<div class="modal fade addResource-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                <form  method="post" action="{{ route('resources.store') }}" enctype="multipart/form-data">
                @csrf
                                       >
                    <p class="modal-heading text-center">Add Resource</p>
                    <input name="resource_name" type="text" placeholder="Resource Name" class="site-input mb-2">
                    <textarea name="description" id="" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description"></textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
                            <div id="yourBtn" onclick="getFile()" class="mr-2">
                                 <input style="height:200px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" name="image" type="file" value="upload" />
                                 <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
                        </form>
                    </div>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="login-btn px-5" data-dismiss="modal" aria-label="Close">Add Resource</button>
                    </div>
                </form>
            </div>
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
                    <input name="resource_name" type="text" placeholder="Resource Name" value="ABC Resource" class="site-input mb-2">
                    <textarea name="description" id="description" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description"></textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                     
                            <div id="yourBtn" onclick="getFile()" class="mr-2">
                                 <input style="height:200px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" name="image" type="file" value="upload" />
                                 <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
                        
                        <div class="position-relative">
                            <img src="images/training-details.png" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle"></i></span>
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
@endsection
