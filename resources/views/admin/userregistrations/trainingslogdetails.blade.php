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
                                            <a href="training-logs.php"><h2 class="mb-2"><i class="fas fa-angle-left"></i> Training Details</h2></a>
                                            <div class="d-flex align-items-center justify-content-end">
                                                <p class="grey-text mr-1 p-md">Status</p>
                                                <p class="active-tag">Pass</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 mt-2 col-lg-8">
                                            <div class="row">
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Training Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{$trainings->training_name}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Category Name</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{$trainings->categories->category_name}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Amount</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{$trainings->amount}}</p></div>
                                                <div class="col-sm-6 text-center mt-2 text-sm-left"><p class="l-grey-text">Date</p></div>
                                                <div class="col-sm-6 text-center mt-0 mt-sm-2 text-sm-left"><p class="grey-text">{{$trainings->created_at}}</p></div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 pb-3 text-center text-sm-left">
                                            <a class="site-btn px-3" data-toggle="modal" data-target=".certificate">View Certificate</a>
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

<div class="modal fade certificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <img src="images/certificate.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>

@endsection
