@include('user.layouts.app')
<div class="wrapper">

        @include('user.layouts.mobile-navigation')

   <!-- inner page starts here -->
        <section class="inner-page my-trainings">
            <img src="{{asset('user/images/triangle.png')}}" alt="" class="img-fluid inner-img-1">
            <img src="{{asset('user/images/circle.png')}}" alt="" class="img-fluid inner-img-2">
            <img src="{{asset('user/images/circle-sm.png')}}" alt="" class="img-fluid inner-img-3">
            <img src="{{asset('user/images/arrow.png')}}" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <div class="pb-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('vendor.dashboard')}}"><h5 class="mb-0"><i class="fas fa-angle-left"></i> Business Trainings</h5></a>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="resource-card pt-xl-5 pt-4 pb-4 px-xl-5 px-4">
                        <div class="d-lg-flex align-items-center justify-content-between">
                            <div class="mt-3">
                                <h6 class="d-grey-text">Training Resources</h6>
                                <h6 class="sm-heading blue-text">Note: This is a time based quiz.</h6>
                            </div>
                            @if($attempt_and_completed->attempt==0 && $attempt_and_completed->completed=="0")
                            <a href="{{ url('vendor/trainingattempts/1')}}" class="site-btn mt-3 green-btn px-5 py-2">Start 1st Attempt Quiz</a>
                            @elseif($attempt_and_completed->attempt==1 && $attempt_and_completed->completed=="0")
                            <a href="{{route('user.trainingdetails.get_question')}}" class="site-btn mt-3 green-btn px-5 py-2">Resume 1st Attempt Quiz</a>
                            
                            @elseif($attempt_and_completed->attempt==1 && $attempt_and_completed->completed=="1")
                            <a href="{{ url('vendor/trainingattempts/2')}}" class="site-btn mt-3 green-btn px-5 py-2">Start 2nd Attempt Quiz</a>
                            
                            @elseif($attempt_and_completed->attempt==2 && $attempt_and_completed->completed=="0")
                            <a href="{{route('user.trainingdetails.get_question')}}" class="site-btn mt-3 green-btn px-5 py-2">Resume 2nd Attempt Quiz</a>
                            @endif
                        </div>
                        
                        @foreach($resources as $resource)
                        <div class="mt-3">
                            <div class="resource-inner-card mr-2 py-3">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 text-center my-auto">
                                        <img src="{{asset('app-assets/images/resources/'.$resource->image)}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-xl-9 col-lg-8 mt-2">
                                        <div class="d-md-flex align-items-center justify-content-between">
                                            <h5 class="sm-heading d-grey-text">Descriptions</h5>
                                            <h6 class="green-text p-lg mb-0">Resource Name: {{$resource->name}}</h6>
                                        </div>
                                        <p class="l-grey-text mt-1">{{$resource->description}}</p>
                                        <div class="mt-2">
                                            <a href="#_" class="site-btn py-2 px-5" data-toggle="modal" id="view-resource" data-target=".videoView" data-id="{{ $resource->id }}">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade videoView" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

                    <div class="text-left">
                        <h6 class="grey-text sm-heading">Resource Name:</h6>
                        <h6 class="green-text">
                        <div id="resource_name"></div>
                        </h6>
                        <br>
                        <h6 class="grey-text sm-heading">Resource Description:</h6>
                        <h6 class="green-text">
                        <div id="resource_description"></div>
                        </h6>
                        <img id="resource_image" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade pdfView" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    
                    <div class="text-lg-left text-center">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 text-center my-auto">
                                <img src="images/pdf.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-xl-9 col-lg-8 mt-2">
                                <h5 class="sm-heading d-grey-text">Resource Name: </h5>
                                <h6 class="green-text p-lg mb-0">James Milner</h6>
                                <p class="l-grey-text mt-1">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</p>
                                <button class="site-btn d-inline-block mt-3 mr-3 py-2 px-5">Previous</button>
                                <button class="site-btn green-btn d-inline-block mt-3 py-2 px-5">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade quizStart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <p class="grey-text sm-heading mb-0 px-lg-5">The Quiz Has Started There Are 50 Questions In The Quiz. Good Luck!</p>
                        <a href="quiz.php" class="d-inline-block site-btn mt-4 py-3 px-5">Start Quiz</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- inner page ends here -->
        @include('user.layouts.site-footer')
    </div>    

 <div class="overlay"></div>

<script type="text/javascript">
$('body').on('click', '#view-resource' , function () {
var resource_id = $(this).data('id');
$.get('/vendor/getresourcedata/'+resource_id+'/view', function (data) {
$('#crud-modal').modal('show');
$('#resource_name').html(data[0]);
$('#resource_description').html(data[1]);
$('#resource_image').attr('src', '{{asset("app-assets/images/resources")}}/'+data[2]);
})
});
 </script>


@include('user.layouts.footer')