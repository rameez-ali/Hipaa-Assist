@extends('admin.layouts.appsidebardashboard ')

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
                                            <a href="{{route('getmyprofile')}}"><h2 class="mb-0"><i class="fas fa-angle-left"></i> Edit Profile</h2></a>

                                             <div  style="margin-top:2px;">
                                            @if ($profileupdatesuccess = Session::get('profileupdatesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Profile Updated Succesfully
                                            </div>
                                            @endif
                                            </div>

                                           <div style="margin-top:2px;">
                                           @if ($passwordupdatesuccess = Session::get('passwordupdatesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Password Updated Succesfully
                                            </div>
                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-2 mt-2 text-center text-sm-left col-lg-4">
                                            <div class="position-relative user-profile-img mx-auto mx-sm-0">
                                               
                                                
                                                <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
                                                @csrf
                                                 @if(auth()->user()->image!=null)
                                                 <img src="{{asset('profile_images/'.auth()->user()->image)}}" alt="" class="img-fluid" id="ImgOri">
                                                 <div id="yourBtn" onclick="getFile()">
                                                 @else
                                                 <img src="" alt="" class="img-fluid" id="ImgOri">
                                                 <div id="yourBtn" onclick="javascript:document.getElementById("imgInp").click();">
                                                 @endif   
                                                    <div class="camera-btn">
                                                        <i class="fas fa-camera"></i>
                                                    </div>
                                                </div>
                                                    <div style="height: 0px;width: 0px; overflow:hidden;">
                                                        <input id="upfile" type="file" value="upload" onchange="sub(this)"></div>
                                                 </form>       
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-2 order-2 order-lg-1 col-lg-8">
                                        
                                        <form method="post" action="{{route('update.profile')}}">
                                        @csrf
                                        @method('put')
                                            <div class="row align-items-center">
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">First Name</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><input name="firstname" type="text" class="site-input grey-text w-100" value="{{ old('firstname', auth()->user()->firstname) }}" required></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text mb-0">Last Name</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><input name="lastname" type="text" class="site-input grey-text w-100" value="{{ old('lastname', auth()->user()->lastname) }}" required></div>
                                                <div class="col-sm-6 mt-2 text-center text-sm-left"><p class="l-grey-text">Email</p></div>
                                                <div class="col-sm-6 mt-2 text-center text-sm-left"><input name="email" type="email" class="site-input grey-text w-100" value="{{ old('email', auth()->user()->email) }}" readonly></div>
                                                <div class="col-sm-6 mt-3 text-center text-sm-left">
                                                        <button class="login-btn px-4 mx-auto mx-sm-0">Update</button>                                                    
                                                </div>
                                            </div>    
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

<div class="modal fade addResource" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-left">
                <form action="create-quiz.php">
                    <p class="modal-heading text-center">Add Resource</p>
                    <input type="text" placeholder="Resource Name" value="ABC Resource" class="site-input mb-2">
                    <textarea name="" id="" cols="30" rows="5" class="w-100 site-input" placeholder="Resource Description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</textarea>
                    <p class="mt-2 black-text mb-0">Upload Media:</p>
                    <div class="d-flex">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
                            <div id="yourBtn" onclick="getFile()" class="mr-2">
                                <img src="images/training-details-2.png" alt="" class="img-fluid">
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" /></div>
                        </form>
                        <div class="position-relative">
                            <img src="images/training-details.png" alt="" class="img-fluid w-100">
                            <span class="rounded-circle cancel-btn border-0 p-0"><i class="fas l-grey-text fa-times-circle"></i></span>
                        </div>
                    </div>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="login-btn px-5" data-toggle="modal" data-target=".resourceAdded" data-dismiss="modal" aria-label="Close">Add Resource</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade resourceAdded" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1">Resource Added Successfully !</p>
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <button class="login-btn px-2 mr-2" data-toggle="modal" data-target=".addResource" data-dismiss="modal" aria-label="Close">Add Another</button>
                    <button class="site-btn px-5" data-dismiss="modal" aria-label="Close">Skip</button>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
 
$(document).ready(function (e) {
 $('#FrmImgUpload').on('change',(function(e) {
 $.ajaxSetup({
 headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
e.preventDefault();
 
var formData = new FormData(this);
console.log(formData);

 
$.ajax({
 
   type:'POST',
 
   url: "{{route('ajax-image-upload')}}",
 
   data:formData,
 
   cache:false,
 
   contentType: false,
 
   processData: false,
 
   success:function(data){
       console.log(data);
       $('#ImgOri').attr('src', '{{asset("/profile_images")}}/'+data);
 
   },
 
   error: function(data){
 
       console.log(data);
 
   }
 
});
 
}));
 
});
 
</script>
@endsection
