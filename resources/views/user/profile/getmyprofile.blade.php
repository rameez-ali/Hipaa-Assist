@include('user.layouts.app')

    <div class="wrapper">

    @include('user.layouts.mobile-navigation')
        
        <hr class="my-0">

               <!-- inner page starts here -->
        <section class="inner-page user-profile">
            <img src="images/triangle.png   " alt="" class="img-fluid inner-img-1">
            <img src="images/circle.png" alt="" class="img-fluid inner-img-2">
            <img src="images/circle-sm.png" alt="" class="img-fluid inner-img-3">
            <img src="images/arrow.png" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
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

                <div class="row">

                    <div class="col-xl-2 col-lg-3">

                        <div class="edit-img">
                            <img src="{{asset('app-assets/images/profile_images_users/'.$user->image)}}" alt="" class="img-fluid" id="ImgOri">
                            <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
                            @csrf    
                                <div id="yourBtn" onclick="getFile()">
                                    <div class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div style="height: 0px;width: 0px; overflow:hidden;"><input name="profile_image" id="upfile" type="file" value="upload" ></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8 mt-4 pl-xl-5 col-lg-9">
                        <h4>My Profile</h4>
                        <form method="post" action="{{route('user.update.profile')}}">
                        @csrf
                                        @method('put')
                            <div class="row align-items-center">
                                <div class="col-5 mt-4">
                                    <p class="l-grey-text mb-0">First Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input name="firstname" type="text" value="{{$user->firstname}}" class="site-input py-2 w-100 px-lg-4 px-2" required>
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text mb-0">Last Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input name="lastname" type="text" value="{{$user->lastname}}" class="site-input py-2 w-100 px-lg-4 px-2" required>
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text mb-0">Email</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input name="email" type="email" value="{{$user->email}}" class="site-input py-2 w-100 px-lg-4 px-2" required>
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text">Contact No</p>
                                    <p class="l-grey-text mb-2">Company Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input class="site-input py-2 w-100 px-lg-4 px-2" name="phone" type="number" value="{{$user->phone}}" required>
                                    <p class="d-grey-text mb-2">ABC Company</p>
                                </div>
                            </div>
                            <button type="submit" class="site-btn green-btn px-5 mt-5 py-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner page ends here -->


    @include('user.layouts.site-footer')
    
    </div>

    <div class="overlay"></div>

@include('user.layouts.footer')

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
   url: "{{route('user-ajax-image-upload')}}",
   data:formData,
   cache:false,
   contentType: false,
   processData: false,
   success:function(data){
       console.log(data);
       $('#ImgOri').attr('src', '{{asset("/app-assets/images/profile_images_users")}}/'+data);
 
   },
   error: function(data){
       console.log(data);
   }
});
}));
});
 
</script>
