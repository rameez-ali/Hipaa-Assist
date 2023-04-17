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
                                            <a href="{{route('trainings.index')}}"><h1 class="mb-1 ml-2"><i class="fas fa-angle-left"></i> Categories</h1></a>
                                            <div class="text-right mr-1">
                                                <a data-toggle="modal" data-target=".addCategory" type="submit" class="site-btn px-2 text-center">Add Category</a>
                                            </div>
                                        </div>
                                    </div>
                                      <div style="margin-top:2px;">
                                      @if ($cataddsuccess = Session::get('cataddsuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Category Added Succesfully
                                            </div>
                                        @endif
                                       </div>
                                       <div style="margin-top:2px;">
                                       @if ($catactivesuccess = Session::get('catactivesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Category Activated Succesfully
                                            </div>
                                        @endif
                                       </div>
                                        <div style="margin-top:2px;">
                                        @if ($catinactivesuccess = Session::get('catinactivesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Category Inactivated Succesfully
                                            </div>
                                        @endif
                                       </div>    
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Category ID</th>
                                                    <th>Category Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->category_id}}</td>
                                                    <td>{{$category->category_name}}</td>
                                                    @if($category->status=="1")
                                                    <td class="green-text">Active</td>
                                                    @else
                                                    <td class="red-text">In Active</td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                            @if($category->status=="1")
                                                                <form action="{{route('category-status-inactive-update')}}" method = "post">
                                                                @csrf
                                                                <input type="hidden" name="status" value = "2">
                                                                <input type="hidden" name="id" value = "{{$category->id}}">
                                                                <button type = "submit" class = "dropdown-item text-center">INACTIVE</button>
                                                                </form>
                                                                @else
                                                                <form action="{{route('category-status-active-update')}}" method = "post">
                                                                @csrf
                                                                <input type="hidden" name="status" value = "1">
                                                                <input type="hidden" name="id" value = "{{$category->id}}">
                                                            <button type = "submit" class = "dropdown-item text-center">ACTIVE</button>
                                                                </form>
                                                            @endif    
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade activeCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-question modal-icon yellow-back"></i>
                </div>
                <p class="grey-text">Are You Sure You Want To Activate The Category?</p>
                <div class="d-flex align-items-center mt-2 justify-content-center">
                    <button class="site-btn mr-2 px-4" data-toggle="modal" data-target=".categoryActivated" data-dismiss="modal" aria-label="Close">Yes</button>
                    <button class="login-btn px-4" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade categoryActivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1 pb-5">Category Activated</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade inactiveCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-question modal-icon yellow-back"></i>
                </div>
                <p class="grey-text">Are You Sure You Want To Inactivate The Category?</p>
                <div class="d-flex align-items-center mt-2 justify-content-center">
                    <button class="site-btn mr-2 px-4" data-toggle="modal" data-target=".categoryInactivated" data-dismiss="modal" aria-label="Close">Yes</button>
                    <button class="login-btn px-4" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade categoryInactivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1 pb-5">Category Inactivated</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <form method="post" action="{{ route('categories.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="text-center">
                <p class="modal-heading text-center">Add Category</p>
                <input name="category_name" type="text" placeholder="Category Name * " class="site-input w-100 mt-1" required>
                <button type="submit" class="site-btn px-3 mt-3" >Create</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade categoryCreated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text pb-4">Category Created</p>
            </div>
        </div>
    </div>
</div>

@endsection
