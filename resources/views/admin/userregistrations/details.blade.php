@extends('admin.layouts.appsidebaruserregistration')

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
                                            <a href="{{route('userregistration.index')}}"><h2 class="mb-2"><i class="fas fa-angle-left"></i> User Registration Details</h2></a>
                                            <div class="d-flex align-items-center mt-2 justify-content-between">
                                                <p class="grey-text">User ID: {{$vendors->user_id}}</p>
                                                <div class="d-flex align-items-center">
                                                    <p class="grey-text mr-1 p-md">Status</p>
                                                    @if($vendors->status=="1")
                                                    <p class="active-tag">Active</p>
                                                    @else
                                                    <p class="active-tag">In Active</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 mt-2 col-lg-8">
                                            <div class="row">
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">First Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->firstname)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Last Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->lastname)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Category</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->categories->category_name)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Training Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->trainings->training_name)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Company Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->companies->company_name)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Amount</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->email)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Email</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->email)}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Password</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">******************</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Date</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{($vendors->created_at)}}</p></div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2 pb-3 text-center text-sm-left">
                                            <form method="post">
                                                @csrf
                                            <a href="{{ url('admin/userregistration/usertraininglogs/'.$vendors->id)}}"  class="site-btn px-5">Training Logs</a>
                                            </form>
                                            
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

@endsection
