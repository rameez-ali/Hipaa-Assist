<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->

      <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/gif" sizes="32x32">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
      <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
      
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
      <!-- <link rel="stylesheet" href="./css/jquery-ui.css"> -->
      <link rel="stylesheet" href="{{asset('user/css/slick.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/slick-theme.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css')}}"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css')}}"/>
      <link rel="stylesheet" href="{{asset('user/css/hover-min.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/jquery.mCustomScrollbar.min.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/ion.rangeSlider.min.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/datatables.min.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/animate.min.css')}}">

      <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('user/css/responsive.css')}}">
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

      <title>
        HIPAA ASSIST | <?php echo "Home"; ?>
      </title>
  </head>
  <body> 

  <!-- <div class='preloader'>
    <div class="preloader-circle"></div>
  </div> -->

   <main class="py-4">
            @yield('content')
   </main>
    