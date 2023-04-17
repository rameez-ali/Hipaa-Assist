@extends('admin.layouts.appsidebardashboard')

@section('content')
<div class="app-content content dashboard">
  <div class="content-wrapper">
    <div class="content-body"> 
      <!-- Basic form layout section start -->
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card grey-card">
              <div class="card-content collapse show">
                <div class="card-dashboard">
                  <div class="row">
                    <div class="box stats-bar right">
                      <div class="col-12">
                        <h1>Quick Stats</h1>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mt-2 col-12 text-center">
                          <div class="c100 p70 big green"> <span>{{($userscount)}}</span>
                            <div class="slice">
                              <div class="bar"></div>
                              <div class="fill"></div>
                            </div>
                          </div>
                          <h2>Total Users</h2>
                        </div>
                        <div class="col-md-6 mt-2 col-12 text-center">
                          <div class="c100 p70 big green"> <span class="blue-text">{{($trainingscount)}}</span>
                            <div class="slice">
                              <div class="bar blue-bar"></div>
                              <div class="fill blue-bar"></div>
                            </div>
                          </div>
                          <h2>Total trainings</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box bottom tickets">
                      <div class="offset-md-9 col-lg-3 col-md-3 col-12 text-md-right text-center">
                        <div class="form-field">
                          <select class="site-input box-shadow" name="" id="" required="">
                              <option value="">2020</option>
                              <option value="">2019</option>
                              <option value="">2018</option>
                          </select>
                        </div>
                      </div>
                      

                    <div class="chart-main position-relative">
                      <div class="row">
                        <div class="col-xl-1 col-12">
                          <h4>Revenue Generated</h4>
                        </div>
                        <div class="col-12">
                          <div id="column-chart" class="height-400 echart-container"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 text-center">
                          <h3>Months</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box mt-3 maain-tabble">
                    <h1>New Users</h1>
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>User Id</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email Address</th>
                          <th>Status</th>
                          <th>OPTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->user_id}}</td>
                          <td>{{$user->firstname}}</td>
                          <td>{{$user->lastname}}</td>
                          <td>{{$user->email}}</td>
                          @if($user->status=="1")
                                                    <td class="green-text">Active</td>
                                                @else
                                                <td class="red-text"> In Active</td>
                                                @endif
                                                    <td>
                                                        <form method="post">
                                                        @csrf
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                <a href="{{ url('admin/userregistrationdetails/'.$user->id)}}"  class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                            </div>
                                                        </div>
                                                       </form>
                                                    </td>
                                                </tr>
                                               @endforeach
                                                                
                      </tbody>
                    </table>
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
