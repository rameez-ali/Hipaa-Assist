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
                                            <a href="{{route('companies.index')}}"><h1 class="mb-2 ml-2"><i class="fas fa-angle-left"></i> Company Details</h1></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="box right d-flex align-items-center justify-content-between">
                                                <h5 class="blue-text">Total No <br> Of Employees</h5>
                                                <h1 class="blue-text my-0">{{$companies->employees}}</h1>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="box right d-flex align-items-center justify-content-between">
                                                <h5 class="blue-text">Trainings <br> Attempted</h5>
                                                <h1 class="blue-text my-0">650</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h5 class="green-text ml-1">{{$companies->company_name}}</h5>
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>First NAME</th>
                                                    <th>Last NAME</th>
                                                    <th>Email Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vendors as $vendor)
                                                <tr>
                                                    <td>{{$vendor->id}}</td>
                                                    <td>{{$vendor->firstname}}</td>
                                                    <td>{{$vendor->lastname}}</td>
                                                    <td>{{$vendor->email}}</td>
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
