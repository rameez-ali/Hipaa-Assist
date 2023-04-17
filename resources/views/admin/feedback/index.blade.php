@extends('admin.layouts.appsidebarfeedback')

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
                                            <h1 class="mb-2 ml-2">Feedback</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble mt-2 table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>First</th>
                                                    <th>Last NAME</th>
                                                    <th>Email Address</th>
                                                    <th>Training Name</th>
                                                    <th>Category Name</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($feedbacks as $feedback)
                                                <tr>
                                                    <td>{{$feedback->id}}</td>
                                                    <td>{{$feedback->vendors->firstname}}</td>
                                                    <td>{{$feedback->vendors->lastname}}</td>
                                                    <td>{{$feedback->vendors->email}}</td>
                                                    <td>{{$feedback->trainings->training_name}}</td>
                                                    <td>{{$feedback->categories->category_name}}</td>
                                                    <td>
                                                        <form method="post">
                                                        @csrf
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                <a href="{{ url('admin/feedbackdetails/'.$feedback->id)}}"  class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
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
