@extends('admin.layouts.appsidebaruserregistration')

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
                                            <a href="{{route('userregistration.index')}}"><h1 class="mb-2 ml-2"><i class="fas fa-angle-left"></i> List of Companies</h1></a>
                                        
                                        <div class="d-sm-flex justify-content-between">
                                                <h1 class="mb-2 ml-2"></h1>
                                                <div>
                                                     <a data-toggle="modal" data-target=".addCompany" class="site-btn d-block mt-1 px-1 text-center">Add Company</a>
                                                </div>
                                            </div>
                                    
                                    <div style="margin-top:2px;width:auto;">
                                                        @if ($companyaddsuccess = Session::get('companyaddsuccess'))
                                                        <div style="margin-top:20px;" class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        Company Added Succesfully
                                                        </div>
                                                        @endif
                                    </div>
                                </div>
                                    <div class="maain-tabble table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>Company NAME</th>
                                                    <th>Total Employees</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($companies as $company)
                                                <tr>
                                                    <td>{{$company->id}}</td>
                                                    <td>{{$company->company_name}}</td>
                                                    <td>{{$company->employees}}</td>
                                                    <td>
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                                <a href="{{url('admin/companydetails/'.$company->id)}}" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                            </div>
                                                        </div>
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

<div class="modal fade addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <p class="modal-heading text-center">Add Company</p>
                <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="company_name" type="text" class="site-input w-100 mt-1" placeholder="Company Name * " required>
                    <select name="category_id" id="category_id" class="site-input w-100 mt-1">
                     <option value="0" selected>Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                      </select>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="site-btn px-5" >Add Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
