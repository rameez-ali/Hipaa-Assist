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
                                            <div class="d-sm-flex justify-content-between">
                                                <h1 class="mb-2 ml-2">Trainings</h1>
                                                <div>
                                                    <a href="{{route('categories.index')}}" type="submit" class="login-btn d-block px-5 text-center">categories</a>
                                                    <a href="{{route('trainings.create')}}" type="submit" class="site-btn d-block mt-1 px-5 text-center">Add training</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top:2px;">
                                      @if ($trainingaddsuccess = Session::get('trainingaddsuccess'))
                                            <div style="margin-top:20px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Training Added Succesfully
                                            </div>
                                        @endif
                                       </div> 
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Training Id</th>
                                                    <th>Training Name</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trainings as $training)
                                                <tr>
                                                <td>{{ $training->id }}</td>
                                                <td>{{ $training->training_id}}</td>
                                                <td>{{ $training->training_name}}</td>
                                                <td>{{ $training->categories->category_name }}</td>
                                                @if($training->status=="1")
                                                    <td class="green-text">Active</td>
                                                @else
                                                <td class="red-text"> In Active</td>
                                                @endif
                                                    <td>
                                                        <form method="post">
                                                        @csrf
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                <a href="{{ url('admin/trainingdetails/'.$training->id)}}"  class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                            </div>
                                                        </div>
                                                       </form>
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
@endsection
