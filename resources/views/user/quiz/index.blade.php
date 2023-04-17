@include('user.layouts.app')

    <div class="wrapper">
      @include('user.layouts.mobile-navigation')
        <hr class="my-0">
@if($quiz_completed==1)
<script>
$(function() {
    $('.quizResult').modal('show');
});
</script>
@endif
        <!-- inner page starts here -->
        <section class="inner-page my-trainings">
            <img src="{{asset('images/triangle.png ')}}'  " alt="" class="img-fluid inner-img-1">
            <img src="{{asset('images/circle.png')}}" alt="" class="img-fluid inner-img-2">
            <img src="{{asset('images/circle-sm.png')}}" alt="" class="img-fluid inner-img-3">
            <img src="{{asset('images/arrow.png')}}" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <h5><a href="{{url('vendor/trainingdetails/'.$training_id)}}"><i class="fas fa-angle-left"></i></a> Quiz</h5>
                <div class="quiz-inner p-xl-5 p-4">
                    <div class="timer mt-3">
                        <h6 >Timer: </h6> <h6 id="minutes"></h6>:<h6 id="seconds"></h6>
                    </div>
                    <div class="resource-inner-card mr-2 mt-4 py-3">
                       @if($quiz_completed==0)
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 text-center my-auto">
                                <img src="{{asset('app-assets/images/quizes/'.$question->image)}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-xl-9 col-lg-8 mt-2">
                                <form id="check_answer">
                                @csrf
                                <p class="l-grey-text mb-0">{{$question->question_number}}:{{$question->question}}</p>
                                <div id="minutes1"></div>:<div id="seconds1"></div>
                                <div class="mt-2">
                                    <input type="hidden" id="question_id" value="{{$question->id}}"> 
                                    <p class="mb-1">
                                        <input type="radio" id="test3" name="radio_group" value="{{$question->option1}}">
                                        <label for="test3" class="grey-text">{{$question->option1}}</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test4" name="radio_group" value="{{$question->option2}}">
                                        <label for="test4" class="grey-text">{{$question->option2}}</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test5" name="radio_group" value="{{$question->option3}}">
                                        <label for="test5" class="grey-text">{{$question->option3}}</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test6" name="radio_group" value="{{$question->option4}}">
                                        <label for="test6" class="grey-text">{{$question->option4}}</label>
                                    </p>
                                    <p class="p-sm mb-0"><i id="exclamation" class="fas red-text"></i> {{ Session::get('success') }}</p>
                                    <button class="site-btn green-btn px-5 py-2 mt-3" id="submit">Next</button>
                                </div>
                              </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade quizResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <a href="heelo"><i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close" onclick="myFunction()"></i></a>

                    <div class="text-center">
                        <div class="modal-icon-div">
                            <i class="fas fa-trophy modal-icon yellow-back"></i>
                        </div>
                        @if($passed==1)
                        <h6 class="d-grey-text sm-heading">Congratulations!</h6>
                        <p class="grey-text medium sm-heading">You Had {{$correct_answer}}/{{$total_question}} Correct Answers And You Have Passed This Quiz.</p>
                         <div class="d-flex justify-content-center">
                            @if($quiz_attempt==1 && $quiz_completed==1)
                            <a href="{{url('/vendor/trainingdetails/'.$training_id)}}" class="redo-btn mr-4 round-btn">
                                <i class="fas fa-redo"></i>
                            </a>
                            @endif
                            <a href="{{url('/vendor/viewcertificate/'.$user_training_id)}}" class="save-btn mr-4 round-btn">
                                <i class="fas fa-file-alt"></i>
                            </a>
                            <a href="{{url('/vendor/trainingreport/'.$training_id)}}" class="star-btn round-btn">
                                <i class="fas fa-certificate"></i>
                            </a>
                        </div>
                        @elseif($passed==2)
                        <h6 class="d-grey-text sm-heading">Bad Luck!</h6>
                        <p class="grey-text medium sm-heading">You Had {{$correct_answer}}/{{$total_question}} Correct Answers And You Have Failed This Quiz.</p>
                        <div class="d-flex justify-content-center">
                            @if($quiz_attempt==1 && $quiz_completed==1)
                            <a href="{{url('/vendor/trainingdetails/'.$training_id)}}" class="redo-btn mr-4 round-btn">
                                <i class="fas fa-redo"></i>
                            </a>
                            @endif
                            <button class="save-btn mr-4 round-btn">
                                <i class="fas fa-file-alt"></i>
                            </button>
                            <a href="{{url('/vendor/trainingreport/'.$training_id)}}" class="star-btn round-btn">
                                <i class="fas fa-certificate"></i>
                            </a>
                        </div>
                        @endif

                        @if($quiz_attempt==1 && $quiz_completed==1)
                        <p class="grey-text medium sm-heading">Attempts Remaining: 1</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- inner page ends here -->

      @include('user.layouts.site-footer')
    </div>

    <div class="overlay"></div>

<script type="text/javascript">
  var i=0;

    $('#check_answer').on('submit',function(event){
        event.preventDefault();
        var question_id= $('#question_id').val();
        var minutes= $('#minutes2').val();
        var seconds= $('#seconds2').val();
        var answer=$("input[type='radio'][name='radio_group']:checked").val();
        
         if(i == '0'){
            answercheck=answer
            i++;
         }
         else{
            $.ajax({
            url: "{{route('user.quiz.answersubmit')}}",
            type:"POST",
            data:{
            "_token": "{{ csrf_token() }}",
            answer:answer,
            question_id:question_id,
            minutes:minutes,
            seconds:seconds,
            },
            success:function(response){
                window.location.href = "{{route('user.trainingdetails.get_question')}}"
            },
           });
         }
         
         $.ajax({
          url: "{{route('user.quiz.answercheck')}}",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            answercheck:answercheck,
            question_id:question_id,
          },
          success:function(response){
            if(response.statusCode==200)
            {
              $.ajax({
               url: "{{route('user.quiz.answersubmit')}}",
               type:"POST",
               data:{
               "_token": "{{ csrf_token() }}",
               answer:answer,
               question_id:question_id,
               minutes:minutes,
               seconds:seconds,
               },
               success:function(response){
                  if(response.statusCode==200)
                  {
                    window.location.href = "{{route('user.trainingdetails.get_question')}}"
                  }
               },
               });

           }
           else{
            $(".fas").addClass('fa-exclamation-circle');
            $(".red-text").css("display", "block");
            $(".red-text").append("Wrong Answer. You have one more attempt left !");
           }
          },
         });
        });
</script>

<script type="text/javascript">
    var sec = <?php echo $stored_seconds ?>;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        var seconds = pad(++sec%60);
        var minutes = pad(parseInt(sec/60,10));

        $('#seconds').html(seconds);
        $('#minutes').html(minutes);

        $("#seconds1").html('<input id="seconds2" type="hidden" value="'+ seconds +'"/>');
        $("#minutes1").html('<input id="minutes2" type="hidden" value="'+ minutes +'"/>');
    }, 1000);
</script>

<script>
var training_id=<?php echo $training_id ?> 
function myFunction() {
      window.location.href = "trainingdetails/",+training_id+
}
</script>

@include('user.layouts.footer')
