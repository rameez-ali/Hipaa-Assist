@extends('admin.layouts.app')

@section('content')
<div class="container">
        <div class="login-card">
            <div class="row ml-0 mr-0">
                <div class="col-lg-6 col-12 pl-0 pr-0 login-left-col">
                </div>
                <div class="col-lg-6 col-12 pl-0 pr-0 d-block login-right-col position-relative">
                    
                    <div class="login-right-content">
                        <div class="text-center">
                            <img src="{{asset('images/logo.png')}}" alt="" class="img-fluid login-logo">
                        </div>
                        <h1 class="login-card-heading doctor">Sign In</h1>
                        @if ( session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                       <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="form-field">
                            <input type="email" class="site-input login left-icon" placeholder="Enter Email Address" name="email" id="email">
                        </div>
                        <div class="form-field">
                            <input type="password" class="site-input login both-icon enter-input" placeholder="Enter Password" name="password" id="password">
                            <i toggle="#password" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                        </div>
                        <div class="below-input-div">
                            <p class="black-text mb-0">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember" class="bordered mb-0">Remember Me</label>
                            </p>
                            <a href="{{ url('admin/forget-password') }}" class="forgot-link">Forgot Password ?</a>
                        </div>
                            <button type="submit" class="login-btn d-inline-block px-5 text-center">Sign In</button>
                        </form>
                    </div>
<!--                     <img src="{{asset('images/hipaa.png')}}" alt="" class="img-fluid login-text w-100">
 -->                </div>
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
