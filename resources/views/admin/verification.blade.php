@extends('admin.layouts.app')

@section('content')

<section class="login-bg">
    <div class="container">
        <div class="login-card">
            <div class="row ml-0 mr-0">
                <div class="col-lg-6 col-12 pl-0 pr-0 login-left-col d-none d-lg-block">
                </div>
                <div class="col-lg-6 col-12 pl-0 pr-0 d-block login-right-col position-relative">
                    <div class="login-right-content">
                        <div class="text-center">
                            <img src="images/logo.png" alt="" class="img-fluid login-logo">
                        </div>
                        <h2 class="login-card-heading mt-4 doctor">Password Recovery</h2>  
                        </form>
                        <div class="mt-3 text-center">
                            <a href="{{url('admin/login')}}" class="black-text">An Email has been sent to your email address</a>
                        </div>
                    </div>
                    <img src="images/hipaa.png" alt="" class="img-fluid login-text w-100">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
