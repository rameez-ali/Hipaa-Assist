@extends('layouts.app')
@section('content')

<section class="login-bg">
    <div class="container">
        <div class="login-card">
            <div class="row ml-0 mr-0">
                <div class="col-lg-6 col-12 pl-0 pr-0 login-left-col d-none d-lg-block">
                </div>
                <div class="col-lg-6 col-12 pl-0 pr-0 d-block login-right-col position-relative">
                    <div class="login-right-content">
                        <form method="POST" action="{{route('admin.resetpassword')}}">
                           @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="text-center">
                            <img src="images/logo.png" alt="" class="img-fluid login-logo">
                        </div>
                        <h2 class="login-card-heading mt-4 doctor">Password Recovery</h2>
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
                        <div class="form-field mt-1">
                            <input type="email" class="site-input login left-icon" placeholder="Email Address" name="email" id="email">
                        </div>
                         <div class="form-field mt-1">
                            <input type="password" class="site-input login left-icon" placeholder="Password " name="password" id="password">
                        </div>
                         <div class="form-field mt-1">
                            <input type="password" class="site-input login left-icon" placeholder=" Confirm Password" name="password-confirm" id="password-confirm">
                        </div>
                        <div class="col-md-4 offset-md-3">
                            <button type="submit" class="login-btn d-inline-block px-5">Reset Password</button>
                        </div>    
                        </form>
                    </div>
                    <img src="images/hipaa.png" alt="" class="img-fluid login-text w-100">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection