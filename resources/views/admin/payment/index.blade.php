@extends('admin.layouts.appsidebarpayment')

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
                                            <h1 class="mb-2 ml-2">Payment Logs</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble mt-4 table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>User Id</th>
                                                    <th>First NAME</th>
                                                    <th>Last NAME</th>
                                                    <th>Email Address</th>
                                                    <th>Training Name</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payments as $payment)
                                                <tr>
                                                    <td>{{$payment->id}}</td>
                                                    <td>{{$payment->vendors->user_id}}</td>
                                                    <td>{{$payment->vendors->firstname}}</td>
                                                    <td>{{$payment->vendors->lastname}}</td>
                                                    <td>{{$payment->vendors->email}}</td>
                                                    <td>{{$payment->trainings->training_name}}</td>
                                                    <td>{{$payment->amount}}</td>
                                                    <td>{{$payment->method}}</td>
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
