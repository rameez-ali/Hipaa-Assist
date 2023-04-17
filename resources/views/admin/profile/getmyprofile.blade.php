@extends('admin.layouts.appsidebardashboard')

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
                                            <h2 class="mb-0"> My Profile</h2>

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

                                            <div style="margin-top:2px;">
                                           @if ($oldpassfailedsuccess = Session::get('oldpassfailedsuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Password failed to Change <br>
                                            Old password is wrong
                                            </div>
                                            @endif
                                            </div>

                                            <div style="margin-top:2px;">
                                           @if ($confirmpassfailedsuccess = Session::get('confirmpassfailedsuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Password failed to Change <br>
                                            Confirm password did not match with new password
                                            </div>
                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-xl-3 mt-2 text-center text-sm-left col-lg-4">
                                            <img src="{{asset('profile_images/'.auth()->user()->image)}}" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-xl-6 mt-2 order-2 order-lg-1 col-lg-8">
                                            <div class="row">
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text">First Name</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="grey-text">{{auth()->user()->firstname}}</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text">Last Name</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="grey-text">{{auth()->user()->lastname}}</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="l-grey-text">Email</p></div>
                                                <div class="col-sm-6 mt-1 text-center text-sm-left"><p class="grey-text">{{auth()->user()->email}}</p></div>
                                                <div class="col-sm-6 mt-3 text-center text-sm-left"><a href="{{route('editprofile')}}" class="login-btn w-100">Edit</a></div>
                                                <div class="col-sm-6 mt-3 text-center text-sm-left"><button data-toggle="modal" data-target=".changePswd" class="site-btn w-100">Change Password</button></div>
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

<div class="modal fade changePswd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content px-lg-5 site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <p class="modal-heading text-center">Change Password</p>
                
                <form method="post" action="{{route('update.password')}}">
                @csrf
                
                    
                    <div class="form-field">
                        <input type="password" class="site-input login both-icon current-input" placeholder="Old Password" name="old_password" id="old_password" required>
                        <i toggle="#old_password" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                    </div>
                    <div class="form-field">
                        <input type="password" class="site-input login both-icon enter-input" placeholder="New Password" name="new_password" id="new_password" required>
                        <i toggle="#new_password" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                    </div>
                    <div class="form-field">
                        <input type="password" class="site-input login both-icon confirm-input" placeholder="Confirm Password" name="password_confirmation" id="confirm_password" required>
                        <i toggle="#confirm_password" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                    </div>
                    <button type="submit" class="login-btn px-5 mx-auto" >Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
@endsection
