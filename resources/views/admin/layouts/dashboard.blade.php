<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Ajax CRUD Example Tutorial with - CodingDriver</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
</head>
  <style>
  .alert-message {
    color: red;
  }
</style>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Laravel Ajax CRUD Application -
       <a href="https://www.codingdriver.com" target="_blank" >CodingDriver</a>
     </h2><br>
     <div class="row" style="clear: both;margin-top: 18px;">
       <div class="col-12 text-right">
          <a href="/login" class="navbar-brand">
          Laravel Custom Auth
          </a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
             <ul class="navbar-nav mr-auto"></ul>
             <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class="row">
        <div class="wrapper ">
           <div class="main-panel">
             @yield('content')
           </div>
         </div>
    </div>
</div>
</body>
</html>