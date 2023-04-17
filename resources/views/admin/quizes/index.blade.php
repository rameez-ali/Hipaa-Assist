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
                                            <a href="{{ url('admin/trainingdetails/'.$training_id)}}"><h2 class="mb-0"><i class="fas fa-angle-left"></i> Create Quiz</h2></a>
                                            <p class="grey-text mt-3">Quiz Type</p>
                                            <form action="#" class="d-flex">
                                                <p class="mr-sm-4 mr-1">
                                                    <input type="radio" id="test1" name="radio-group" checked>
                                                    <label for="test1">Enable Time Based</label>
                                                </p>
                                                <p>
                                                    <input type="radio" id="test2" name="radio-group">
                                                    <label for="test2">Normal</label>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 mt-1 col-sm-3"><p class="l-grey-text mb-0">Duration</p></div>
                                        <div class="col-lg-3 mt-1 col-sm-4"><input type="number" name="" value="10" class="site-input" id=""></div>
                                        <div class="col-lg-6 mt-1 col-sm-5 col-xl-4">
                                            <select name="" id="" class="site-input">
                                                <option value="">Minute(s)</option>
                                                <option value="">Hour(s)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            
                                            <div class="resource-card pt-2 pb-4 pl-md-3 pl-1 pr-1">
                                                 <div style="margin-top:2px;">
                                                        @if ($questionaddsuccess = Session::get('questionaddsuccess'))
                                                        <div style="margin-top:20px;" class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        Question Added Succesfully
                                                        </div>
                                                        @endif
                                                </div>
                                                <div style="margin-top:2px;">
                                                        @if ($questionupdatesuccess = Session::get('questionupdatesuccess'))
                                                        <div style="margin-top:20px;" class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        Question Updated Succesfully
                                                        </div>
                                                        @endif
                                                </div>
                                                <div style="margin-top:2px;">
                                                        @if ($questiondelsuccess = Session::get('questiondelsuccess'))
                                                        <div style="margin-top:20px;" class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        Question Deleted Succesfully
                                                        </div>
                                                        @endif
                                                </div>
                                              @foreach($quizes as $quiz)
                                                <div class=" mt-3">
                                                    <div class="resource-inner-card mr-2 py-3">
                                                        <div class="row">
                                                            <div class="col-xl-4 text-center my-auto">
                                                                <img src="{{asset('app-assets/images/quizes/'.$quiz->image)}}" alt="" class="img-fluid">
                                                            </div>
                                                            <div class="col-xl-8 mt-2">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="l-grey-text mb-0">{{$quiz->question_number}}:
                                                                        {{$quiz->question}}</p>                                                                     
                                                                    <div class="btn-group custom-dropdown ml-2 mb-1">
                                                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                                        <form method="post">
                                                                             @csrf   
                                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                                 <a class="dropdown-item" data-toggle="modal" id="edit-question"data-target=".editQuestion" data-id="{{ $quiz->id }}" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>

                                                                                <a href="{{ url('admin/quizdelete/'.$quiz->id)}}" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                                                            </div>
                                                                           </form>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    @if($quiz->option1==$quiz->correct_answer)
                                                                    <p>
                                                                        <input type="radio"  class="check" checked="checked" >
                                                                        <label for="test3">{{$quiz->option1}}</label>
                                                                    </p>
                                                                    @else
                                                                    <p>
                                                                        <input type="radio" >
                                                                        <label for="test3">{{$quiz->option1}}</label>
                                                                    </p>
                                                                    @endif
                                                                
                                                                     @if($quiz->option2==$quiz->correct_answer)
                                                                    <p>
                                                                        <input type="radio"  class="check" checked="checked" >
                                                                        <label for="test3">{{$quiz->option2}}</label>
                                                                    </p>
                                                                    @else
                                                                    <p>
                                                                        <input type="radio" >
                                                                        <label for="test3">{{$quiz->option2}}</label>
                                                                    </p>
                                                                    @endif

                                                                    @if($quiz->option3==$quiz->correct_answer)
                                                                    <p>
                                                                        <input type="radio"  class="check" checked="checked" >
                                                                        <label for="test3">{{$quiz->option3}}</label>
                                                                    </p>
                                                                    @else
                                                                    <p>
                                                                        <input type="radio" >
                                                                        <label for="test3">{{$quiz->option3}}</label>
                                                                    </p>
                                                                    @endif

                                                                    @if($quiz->option4==$quiz->correct_answer)
                                                                    <p>
                                                                        <input type="radio"  class="check" checked="checked" >
                                                                        <label for="test3">{{$quiz->option4}}</label>
                                                                    </p>
                                                                    @else
                                                                    <p>
                                                                        <input type="radio" >
                                                                        <label for="test3">{{$quiz->option4}}</label>
                                                                    </p>
                                                                    @endif



                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="mt-5">
                                                    <a href="#_" class="site-btn px-4" data-toggle="modal" data-target=".addQuestion"><i class="fas fa-plus-circle"></i> Add</a>
                                                </div>
                                            </div>
                                            <div class="pt-3 pb-5">
                                                <!-- <form action="training-details.php">
                                                    <button class="px-5 mx-auto login-btn">Save</button>
                                                </form> -->
                                            </div>
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
<div class="modal fade addQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                <form method="post" id="productForm" action="{{ route('quizes.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                 @csrf   
                    
                    <input type="hidden" name="training_id" class="site-input w-100" value="{{$training_id}}">

                    <p class="modal-heading text-center">Add Question</p>
                    <p class="mt-1 black-text mb-0">{{$question_number}}:</p>
                    <textarea name="question" id="" cols="30" rows="5" class="w-100 site-input" placeholder="Enter Question * " required></textarea>
                    <p class="mt-2 black-text mb-0">Upload Image * :</p>
                   <div class="d-flex">
                      <div class="d-flex">
                                <input style="height:100px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" id="image" type="file" name="image" accept="image/*" onchange="readURL1(this);" required/>
                                <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                <img style="padding-left:20px;border-style: hidden;" id="modal-preview1" class="hidden"  width="220" height="190" alt="">
                            
                        <div class="position-relative">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle" onclick="remove_image1()"></i></span>
                        </div>
                    </div>
                    </div>
                    <p class="mt-1 black-text mb-0">Options:</p>
                    <div class="mt-2">
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test27" name="radio_group" value="1" >
                                <label for="test27"></label>
                            </p>
                            <input name="option1" type="text" class="w-100 site-input"  placeholder="Enter Option * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test28" name="radio_group" value="2"  >
                                <label for="test28"></label>
                            </p>
                            <input name="option2" type="text" class="w-100 site-input" placeholder="Enter Option * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test29" name="radio_group" value="3" >
                                <label for="test29"></label>
                            </p>
                            <input name="option3" type="text" class="w-100 site-input" placeholder="Enter Option * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test30" name="radio_group" value="4" >
                                <label for="test30"></label>
                            </p>
                            <input name="option4" type="text" class="w-100 site-input"  placeholder="Enter Option *" required>
                        </div>
                        <p class="mt-1 black-text mb-0">Note: Select the correct answer</p>
                    </div>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" id="saveBtn" onclick="answercheck()" class="login-btn px-5" >Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade editQuestion" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                 <form method="post" action="{{ route('quizes.update') }}" enctype="multipart/form-data">
                 @csrf
                    <input type="hidden" name="training_id" class="site-input w-100" value="{{$training_id}}" required>
                    <p class="modal-heading text-center">Edit Question</p>
                    <p class="mt-1 black-text mb-0" id="question_number" ></p>
                    <textarea name="question" id="question" cols="30" rows="5" class="w-100 site-input" placeholder="Enter Question *" required></textarea>
                    <p class="mt-2 black-text mb-0">Upload Image:</p>
                    <div class="d-flex">
                                <input style="height:100px;position:absolute;padding: 87px 0px 87px 0px;opacity: 0;" id="image" type="file" name="image" accept="image/*" onchange="readURL(this);" />
                                <img src="{{asset('images/training-details-2.png')}}" alt="" class="img-fluid">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                                <img style="padding-left:20px;" id="modal-preview"  src="" width="220" height="190" alt="">
                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)" /></div>
                        <div class="position-relative">
                            <img  src="" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle" onclick="remove_image()"></i></span>
                        </div>
                    </div>
                    <p class="mt-1 black-text mb-0">Options:</p>
                    <div class="mt-2">
                          <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test40" name="radio_group" value="1"  >
                                <label for="test40"></label>
                            </p>
                            <input name="option1" type="text" id="option1" class="w-100 site-input" value="Option 1" placeholder="Enter Option * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test41" name="radio_group" value="2" >
                                <label for="test41"></label>
                            </p>
                            <input name="option2" type="text" id="option2" class="w-100 site-input" value="Option 2" placeholder="Enter Option * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test42"  name="radio_group" value="3" >
                                <label for="test42"></label>
                            </p>
                            <input name="option3" type="text" id="option3" class="w-100 site-input" value="Option 3" placeholder="Enter Option  * " required>
                        </div>
                        <div class="mb-1 d-flex align-items-center">
                            <p class="mr-2">
                                <input type="radio" id="test43" name="radio_group" value="4" >
                                <label for="test43"></label>
                            </p>
                            <input name="option4" type="text" id="option4" class="w-100 site-input" value="Option 4" placeholder="Enter Option * " required>
                        </div>
                        <p class="mt-1 black-text mb-0">Note: Select the correct answer</p>
                    </div>
                    <input name="id" id="id" type="hidden" class="site-input w-100 mt-1">
                    <div class="modal-btn-div mt-2">
                        <button type="submit"  class="login-btn px-5" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-question modal-icon yellow-back"></i>
                </div>
                <p class="grey-text">Are You Sure You Want To Delete The Question?</p>
                <div class="d-flex align-items-center mt-2 justify-content-center">
                    <button class="login-btn mr-2 px-4" data-toggle="modal" data-target=".questionDeleted" data-dismiss="modal" aria-label="Close">Yes</button>
                    <button class="site-btn px-4" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade questionDeleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1 pb-5">Question Has Been Deleted</p>
            </div>
        </div>
    </div>
</div>

<script>
  $('body').on('click', '#edit-question', function () {
var question_id = $(this).data('id');
$.get('/hipaa/admin/quizedit/'+question_id+'/edit', function (data) {
$('#customerCrudModal').html("Edit customer");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#id').val(data.id);
$('#question_number').val(data.question_number);
$('#question').val(data.question);
var option1_status = data.option1;
var option2_status = data.option2;
var option3_status = data.option3;
var option4_status = data.option4;
var correct_answer = data.correct_answer;
$('#option1').val(data.option1);
$('#option2').val(data.option2);
$('#option3').val(data.option3);
$('#option4').val(data.option4);


if(option1_status==correct_answer)
{
$('#test40').prop('checked', true);
}
else if(option2_status==correct_answer)
{
$('#test41').prop('checked', true);
}
else if(option3_status==correct_answer)
{
$('#test42').prop('checked', true);
}
else if(option4_status==correct_answer)
{
$('#test43').prop('checked', true);    
}


$('#modal-preview').attr('alt', 'No image available');
console.log('{{asset("app-assets/images/quizes")}}/'+data.image)
$('#modal-preview').attr('src', '{{asset("app-assets/images/quizes")}}/'+data.image);
$('#hidden_image').attr('src', '{{asset("app-assets/images/quizes")}}/'+data.image);
})
});

function readURL(input, id) {
id = id || '#modal-preview';
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$(id).attr('src', e.target.result);
};
reader.readAsDataURL(input.files[0]);
$('#modal-preview').removeClass('hidden');
$('#start').hide();
}
}

function readURL1(input, id) {
id = id || '#modal-preview1';
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$(id).attr('src', e.target.result);
};
reader.readAsDataURL(input.files[0]);
$('#modal-preview1').removeClass('hidden');
$('#start').hide();
}
}

function remove_image(){
    document.getElementById('modal-preview').removeAttribute('src');
    $('#modal-preview').addClass('hidden');
}

function remove_image1(){
    document.getElementById('modal-preview1').removeAttribute('src');
    $('#modal-preview1').addClass('hidden');
}

function answercheck() {
    var option = $("input[name='radio_group']:checked").val();

    if(option==null)
    {
        alert('Please select the correct answer');
    }
    else{
        
    }
}
  </script>




@endsection
