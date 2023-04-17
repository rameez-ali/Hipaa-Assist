@extends('admin.layouts.appsidebartrainings')

@section('content')
<div class="app-content content dashboard">
  <div class="content-wrapper">
    <div class="content-body"> 
      <!-- Basic form layout section start -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card ">
              <div class="card-content collapse show">
                <div class="card-dashboard">
                  <div class="row">
                   <div class="col-12">
                    <a href="user-registration.php"><h1><i class="fas fa-angle-left"></i> Quiz Report</h1></a>
                    <div class="row mt-1">
                      @foreach($no_of_attempts_againts_training as $quizreport)
                      <div class="col-md-6 mt-1 col-12 text-center">
                        <div class="box right d-xl-flex justify-content-between align-items-center">
                          <h5 class="mt-1">{{$quizreport->question}}</h5>
                          <div class="c100 mt-1 mr-xl-0 p70 big green"> <span>80</span>
                            <div class="slice">
                              <div class="bar"></div>
                              <div class="fill"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <div class="col-12 mt-2">
                        <!-- <p class="grey-text">Download Report</p>
                        <img src="images/pdf.png" alt="" class="img-fluid"> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>


@endsection

