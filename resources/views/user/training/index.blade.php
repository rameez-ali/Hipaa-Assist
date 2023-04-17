@include('user.layouts.app')

    <div class="wrapper">
      @include('user.layouts.mobile-navigation')
        <hr class="my-0">

        <!-- inner page starts here -->
        <section class="inner-page my-trainings')}}">
            <img src="{{asset('images/triangle.png')}}" alt="" class="img-fluid inner-img-1">
            <img src="{{asset('images/circle.png')}}" alt="" class="img-fluid inner-img-2">
            <img src="{{asset('images/circle-sm.png')}}" alt="" class="img-fluid inner-img-3">
            <img src="{{asset('images/arrow.png')}}" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <div class="pb-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('user.trainingdetails.my_trainings')}}"><h5 class="mb-0"><i class="fas fa-angle-left"></i> Business Trainings</h5></a>
                        <div class="d-flex align-items-center">
                            <p class="p-sm mb-0 bold mr-2">Status</p>
                            @if($exam_status==1)
                            <p class="status-tag green-tag mb-0">Pass</p>
                            @elseif($exam_status==2)
                            <p class="status-tag red-tag mb-0">Fail</p>
                            @else
                            <p class="status-tag orange-tag mb-0">Incomplete</p>
                            @endif

                        </div>
                    </div>
                    <p class="p-lg bold green-text">{{$trainings->categories->category_name}}</p>
                    <img src="{{asset('app-assets/images/trainings/'.$trainings->image)}}" alt="" class="img-fluid w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="d-grey-text mt-4">Descriptions</h5>
                        @if($exam_status==1)
                        <h1 class="status-tag green-tag mb-0">Passed: {{$correct_answer}}/{{$total_question}}</h1>
                        @elseif($exam_status==2)
                       <h1 class="status-tag red-tag mb-0">Fail: {{$correct_answer}}/{{$total_question}}</h1>
                       @endif
                   </div>
                    
                    <h6 class="sm-heading blue-text">Amount:{{$amount}}</h6>
                    <p class="grey-text mt-3">{{$trainings->description}}</p>
                     <div class="d-sm-flex">
                        @if($exam_status==1)
                        <a href="{{url('vendor/viewcertificate/'.$user_training_id)}}"class="site-btn green-btn px-5 mr-2 py-2 mt-4">View Certificate</a>
                         <a href="{{url('vendor/downloadcertificate/'.$user_training_id)}}"class="site-btn green-btn px-5 mr-2 py-2 mt-4">Download Certificate</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- inner page ends here -->

      @include('user.layouts.site-footer')
    </div>

    <div class="overlay"></div>

@include('user.layouts.footer')
