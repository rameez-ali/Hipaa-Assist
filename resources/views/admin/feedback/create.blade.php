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
                                            <a href="trainings.php"><h2 class="mb-0"><i class="fas fa-angle-left"></i> Add Training</h2></a>
                                            <div class="d-flex align-items-center mt-5 justify-content-between">
                                                <p class="grey-text">T ID: 01</p>
                                                <div class="d-flex align-items-center">
                                                    <p class="grey-text mr-1 p-md">Status</p>
                                                    <p class="active-tag">Active</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="post" action="{{ route('trainings.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                                     @csrf
                                        <div class="row">
                                            <div class="col-lg-6"><input name="training_name" type="text" class="site-input w-100" placeholder="Training Name"></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-lg-6">
                                                <select name="category_id" id="category_id" class="site-input">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-lg-6"><input name="pass_percentage" type="text" class="site-input w-100" placeholder="Passing Percentage"></div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-lg-6">
                                                <p class="grey-text">Image</p>
                                                    <div class="b1" onclick="getFile()">
                                                    <input style="height:200px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" name="image" type="file" value="upload" />
                                                        <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                                    </div>
                                                    <div style='height: 0px;width: 0px; overflow:hidden;'>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <textarea name="description" id="" cols="30" rows="8" class="site-input w-100" placeholder="Description"></textarea>
                                            </div>
                                        </div>

                                        <input name="training_id" id="training_id" type="hidden" value="{{$training_id}}"/>
                                        <button class="site-btn px-5" type="submit">Create</button>

                                    </form>
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
        <div class="modal-content site-mheight:500px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;odal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                <form action="create-quiz.php">
                    <p class="modal-heading text-center">Add Resource</p>
                    <input type="text" placeholder="Resource Name" class="site-input mb-2">
                    <textarea name="" id="" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description"></textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
                            <div id="yourBtn" onclick="getFile()" class="mr-2">
                                <img src="images/training-details-2.png" alt="" class="img-fluid">
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
                <form action="create-quiz.php">
                    <p class="modal-heading text-center">Add Resource</p>
                    <input type="text" placeholder="Resource Name" value="ABC Resource" class="site-input mb-2">
                    <textarea name="" id="" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
                            <div id="yourBtn" onclick="getFile()" class="mr-2">
                                <img src="images/training-details-2.png" alt="" class="img-fluid">
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
                        </form>
                        <div class="position-relative">
                            <img src="images/training-details.png" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle"></i></span>
                        </div>
                    </div>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="login-btn px-5" data-dismiss="modal" aria-label="Close">Add Resource</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection