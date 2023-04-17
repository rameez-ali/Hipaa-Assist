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
                                            <div class="d-sm-flex justify-content-between">
                                                <h2 class="mb-2 ml-2">User Registration</h2>
                                                <div>
                                                    <a data-toggle="modal" data-target=".addUser" class="login-btn d-block px-5 text-center">Add User</a>
                                                    <a href="{{route('companies.index')}}" class="site-btn d-block mt-1 px-1 text-center">View all companies</a>
                                                </div>
                                            </div>
                                            <div style="margin-top:2px;">
                                            @if ($useraddsuccess = Session::get('useraddsuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User Added Succesfully
                                            </div>
                                            @endif
                                            </div>

                                            <div style="margin-top:2px;">
                                            @if ($userupdatesuccess = Session::get('userupdatesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User Updated Succesfully
                                            </div>
                                            @endif
                                            </div>

                                            <div style="margin-top:2px;">
                                            @if ($incorrectpasswordupdatesuccess = Session::get('incorrectpasswordupdatesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User failed to Update <br>
                                            Password did not match with confirm password
                                            </div>
                                            @endif
                                            </div>

                                            <div style="margin-top:2px;">
                                            @if ($incorrectpasswordcreatesuccess = Session::get('incorrectpasswordcreatesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User failed to Create <br>
                                            Password did not match with confirm password
                                            </div>
                                            @endif
                                            </div>

                                           <div style="margin-top:2px;">
                                           @if ($useractivesuccess = Session::get('useractivesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User Activated Succesfully
                                            </div>
                                            @endif
                                            </div>

                                            <div style="margin-top:2px;">
                                            @if ($userinactivesuccess = Session::get('userinactivesuccess'))
                                            <div style="margin-top:10px;" class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            User Inactivated Succesfully
                                            </div>
                                            @endif
                                            </div> 
                                           </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row ml-0 mt-1 mr-0">
                                        <div class="col-12">
                                            <label  for="">Sort By:</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-xl-flex justify-content-between align-items-center">
                                                <div class="d-sm-flex">
                                                   <input id="datepicker1"  type="text" class="site-input site-select ml-sm-1 mt-1 mt-sm-0 border px-2" readonly placeholder="From" type="text">
                                                    <input id="datepicker2"  type="text" class="site-input site-select ml-sm-1 mt-1 mt-sm-0 border px-2" readonly placeholder="To" type="text">
                                                </div>
                                                 <div class="d-sm-flex">
                                                    <select id="company_filter" class="site-input mt-1 site-select w-100">
                                                        <option value="0" selected>Select Company</option>
                                                         @foreach($companies as $company)
                                                         <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                         @endforeach
                                                    </select>
                                                    <select id="status_filter" class="site-input mt-1 site-select w-100">
                                                        <option value="0">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                        <div name="company_id_status" id="company_id_status"></div>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="maain-tabble table-responsive">
                                         <table class="table table-striped table-bordered zero-configuration striped" id="ajax_table" >
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>User Id</th>
                                                    <th>First NAME</th>
                                                    <th>Last NAME</th>
                                                    <th>Email Address</th>
                                                    <th>Training Name</th>
                                                    <th>Company Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($vendors!=null)
                                            @foreach($vendors as $vendor)
                                                <tr>
                                                    <td>{{$vendor->id}}</td>
                                                    <td>{{$vendor->user_id}}</td>
                                                    <td>{{$vendor->firstname}}</td>
                                                    <td>{{$vendor->lastname}}</td>
                                                    <td>{{$vendor->email}}</td>
                                                    <td>{{$vendor->trainings->training_name}}</td>
                                                    <td>{{$vendor->companies->company_name}}</td>
                                                    <td>{{$vendor->date}}</td>
                                                    @if($vendor->status=="1")
                                                    <td class="green-text">Active</td>
                                                    @else
                                                    <td class="red-text">In Active</td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <form method="post">
                                                            @csrf
                                                            <div class="dropdown-menu custom-dropdown">
                                                                <form method="post">
                                                                @csrf 
                                                                <a href="{{ url('admin/userregistrationdetails/'.$vendor->id)}}" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                                </form>
                                                                 <a class="dropdown-item" data-toggle="modal" id="edit-customer" data-target=".editUser" data-id="{{ $vendor->id }}" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                                                                
                                                                <a href="{{ url('admin/quizreport/'.$vendor->trainings->id)}}" class="dropdown-item"><i class="fa fa-file-alt" aria-hidden="true"></i>Quiz Report</a>
                                                                @if($vendor->status=="1")
                                                                <form action="{{route('user-status-inactive-update')}}" method = "post">
                                                                @csrf
                                                                <input type="hidden" name="status" value = "2">
                                                                <input type="hidden" name="id" value = "{{$vendor->id}}">
                                                                <button type = "submit" class = "dropdown-item text-center">INACTIVE</button>
                                                                </form>
                                                                @else
                                                                <form action="{{route('user-status-active-update')}}" method = "post">
                                                                @csrf
                                                                <input type="hidden" name="status" value = "1">
                                                                <input type="hidden" name="id" value = "{{$vendor->id}}">
                                                            <button type = "submit" class = "dropdown-item text-center">ACTIVE</button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               @endforeach
                                               @endif
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

<div class="modal fade addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <p class="modal-heading text-center">Add User</p>
                <form method="POST" action="{{ route('userregistration.store') }}" enctype="multipart/form-data">
                    @CSRF
                    <div class="d-sm-flex">
                        <input name="firstname" type="text" class="site-input w-100 mr-1 mt-1" placeholder="First Name * " required>
                        <input name="lastname" type="text" class="site-input w-100 mt-1" placeholder="Last Name * " required>
                    </div>
                    <input name="email" type="email" class="site-input w-100 mt-1" placeholder="Email Address * " required>
                    <input name="phone" type="number" class="site-input w-100 mt-1" placeholder="Phone Number * " required>
                    <div class="d-sm-flex">
                        <div class="form-field w-100 my-1 mr-1">
                            <input name="password" type="password" class="site-input w-100 login both-icon enter-input" placeholder="Enter Password * "  id="password" required>
                            <i toggle="#password" class="fa fa-eye-slash enter-icon right-icon toggle-password1" aria-hidden="true"></i>
                        </div>
                        <div class="form-field w-100 my-1">
                            <input name="confirm_password" type="password" class="site-input w-100 login both-icon enter-input" placeholder="Confirm Password * "  id="confirm_password" required>
                            <i toggle="#confirm_password" class="fa fa-eye-slash enter-icon right-icon toggle-password1" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="d-sm-flex">
                        
                        <select name="category_id" id="category_id" class="site-input w-100 mr-1" required>
                            <option selected value="">--Select Category--</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <select name="training_id" id="training_id" class="site-input w-100 mr-1" required>
                        </select>
                        <select name="company_id" id="company_id" class="site-input w-100 mr-1" required>
                        </select>
                    </div>
                    <input name="amount"  type="number" class="site-input w-100 mt-1" placeholder="Amount * " required>
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="site-btn px-5" >Add User</button>
                    </div>
                </form>
            </div>
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
                    <input name="company_name" type="text" class="site-input w-100 mt-1" placeholder="Company Name">
                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="site-btn px-5" >Add Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade editUser" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <p class="modal-heading text-center">Edit User</p>
                <form method="post" action="{{ route('userregistration.update') }}" enctype="multipart/form-data">
                @csrf
                    <input name="id" id="id" type="hidden" class="site-input w-100 mt-1">

                    <div class="d-sm-flex">
                        <input name="firstname" id="firstname" type="text" class="site-input w-100 mr-1 mt-1" placeholder="First Name * " required>
                        <input name="lastname" id="lastname" type="text" class="site-input w-100 mt-1" placeholder="Last Name * " required>
                    </div>
                    <input name="email" id="email" type="email" class="site-input w-100 mt-1" placeholder="Email Address * " required>
                     <input name="phone" id="phone" type="number" class="site-input w-100 mt-1" placeholder="Phone Number * " required>
                    <div class="d-sm-flex">
                        <div class="form-field w-100 my-1 mr-1">
                            <input type="password" class="site-input login both-icon enter-input" placeholder="New Password" name="password" id="password_edit" required>
                        <i toggle="#password_edit" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                        </div>
                        <div class="form-field w-100 my-1">
                          <input type="password" class="site-input login both-icon confirm-input" placeholder="Confirm Password" name="password_confirmation" id="confirm-password_edit" required>
                        <i toggle="#confirm-password_edit" class="fa fa-eye-slash enter-icon right-icon toggle-password" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="d-sm-flex">
                        <select name="category_id_edit" id="category_id_edit" class="site-input w-100 mr-1" required>
                        </select>
                        <select name="training_id_edit" id="training_id_edit" class="site-input w-100 mr-1" required>
                        </select>
                        <select name="company_id_edit" id="company_id_edit" class="site-input w-100 mr-1" required>
                        </select>
                    </div>
                    <input name="amount" id="amount" placeholder="Amount * " type="number" class="site-input w-100 mt-1" required>

                    <div class="modal-btn-div mt-2">
                        <button type="submit" class="site-btn px-5" aria-label="Close">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade activeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-question modal-icon yellow-back"></i>
                </div>
                <p class="grey-text">Are You Sure You Want To Activate The User?</p>
                <div class="d-flex align-items-center mt-2 justify-content-center">
                    <button class="site-btn mr-2 px-4" data-toggle="modal" data-target=".userActivated" data-dismiss="modal" aria-label="Close">Yes</button>
                    <button class="login-btn px-4" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade userActivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1 pb-5">User Is Now Active</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade inactiveUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-question modal-icon yellow-back"></i>
                </div>
                <p class="grey-text">Are You Sure You Want To Inactivate The User?</p>
                <div class="d-flex align-items-center mt-2 justify-content-center">
                    <button class="site-btn mr-2 px-4" data-toggle="modal" data-target=".userInactivated" data-dismiss="modal" aria-label="Close">Yes</button>
                    <button class="login-btn px-4" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade userInactivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-check modal-icon"></i>
                </div>
                <p class="grey-text mt-1 pb-5">User Is Now Inactive</p>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$('body').on('click', '#edit-customer' , function () {
var customer_id = $(this).data('id');
$.get('/admin/userregistration/'+customer_id+'/edit', function (data) {
$('#customerCrudModal').html("Edit customer");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#id').val(data[0]);
$('#firstname').val(data[1]);
$('#lastname').val(data[2]);
$('#email').val(data[3]);
$('#phone').val(data[4]);
$('#password_edit').val(data[5]);
$('#confirm-password_edit').val(data[5]);
$('#amount').val(data[6]);
// $('select[name="category_id"]').append('<option value="'+ data.email+'">'+ data.email+'</option>');
})
});
</script>

<script>

 $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "text") {
    input.attr("type", "password");
  } else {
    input.attr("type", "text");
  }
});

</script>

<script>

 $(".toggle-password1").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "text") {
    input.attr("type", "password");
  } else {
    input.attr("type", "text");
  }
});

</script>

<script type="text/javascript">
 $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


<script type="text/javascript">
jQuery(document).ready(function ()
{
        $('body').on('click', '#edit-customer' , function (){
           var customer_id = jQuery(this).data('id');
           jQuery('select[name="category_id_edit"]').empty();
              jQuery.ajax({
                 url : '{{url("/admin/userregistration")}}/getcategories/'+customer_id,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="category_id_edit"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="category_id_edit"]').append('<option value="' + value.id + '">' + value.category_name + '</option>');
                     });
                    
                 }
              });
        });
});
 </script>

<script type="text/javascript">
jQuery(document).ready(function ()
{
        $('body').on('click', '#edit-customer' , function (){
           var company_id_edit = jQuery(this).data('id');
           jQuery('select[name="company_id_edit"]').empty();
              jQuery.ajax({
                 url : '{{url("/admin/userregistration")}}/getcompanies/'+company_id_edit,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="company_id_edit"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="company_id_edit"]').append('<option value="' + value.id + '">' + value.company_name + '</option>');
                     });
                    
                 }
              });
        });
});
 </script>

<script type="text/javascript">
jQuery(document).ready(function ()
{
        $('body').on('click', '#edit-customer' , function (){
           var training_id_edit = jQuery(this).data('id');
           jQuery('select[name="training_id_edit"]').empty();
              jQuery.ajax({
                 url : '{{url("/admin/userregistration")}}/gettrainings/'+training_id_edit,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="training_id_edit"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="training_id_edit"]').append('<option value="' + value.id + '">' + value.training_name + '</option>');
                     });
                    
                 }
              });
        });
});
 </script>






<script type="text/javascript">
     jQuery(function() {
      jQuery("#datepicker1, #datepicker2, #company_filter, #status_filter").change(function() {
     var date_from = $('#datepicker1').val();
     var date_to = $('#datepicker2').val();
     var company_id = $('#company_filter').val();
     var status_id = $('#status_filter').val();
     if(date_from!="" || date_to!="" || company_id!=0 || status_id!=0  ){
     jQuery.ajax({
      url: "{{url('/admin/userregistration/getfilterrecords/getdate')}}?date_from=&&date_to=&&company_id=&&status_id=",
      type: "GET",
      data: {
        "date_from": date_from,
        "date_to": date_to,
        "company_id": company_id,
        "status_id": status_id,
      },
       success:function(res){
      if(res){
        $("#orignal_table").addClass('hide');
        $("#ajax_table").empty();
        console.log(res)
        $(".striped").append('<thead><tr><th>S.NO</th><th>USER_ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAILADDRESS</th><th>TRAINING NAME</th><th>COMPANY NAME</th><th>DATE</th><th>STATUS</th><th>Action</th></tr></thead>');
        $.each(res,function(key,value){
            if(value.status=="1"){
           $(".striped").append('<tbody><tr><td>'+ value.user_id +'</td><td>'+ value.firstname +'</td><td>'+ value.email.substr(0, 20) +'</td><td value="'+ key +'">'+ value.lastname +'</td><td>'+value.email+'</td><td>'+value.training_name+'</td><td>'+value.company_name+'</td><td>'+value.date+'</td><td class="green-text">'+value.status_name+'</td><td><div class="btn-group custom-dropdown ml-2 mb-1"><button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button><form method="post">@csrf<div class="dropdown-menu custom-dropdown"><form method="post">@csrf<a href="userregistrationdetails/'+ value.id +'" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a></form><a class="dropdown-item" data-toggle="modal" id="edit-customer" data-target=".editUser" data-id="'+value.id+'" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a><a href="quiz-report.php" class="dropdown-item"><i class="fa fa-file-alt" aria-hidden="true"></i>Quiz Report</a><form action="{{route('user-status-inactive-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "0"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">INACTIVE</button></form><form action="{{route('user-status-active-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "1"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">ACTIVE</button></form></div></div></td></tr></tbody>');
           }
           else{
            $(".striped").append('<tbody><tr><td>'+ value.user_id +'</td><td>'+ value.firstname +'</td><td>'+ value.email.substr(0, 20) +'</td><td value="'+ key +'">'+ value.lastname +'</td><td>'+value.email+'</td><td>'+value.training_name+'</td><td>'+value.company_name+'</td><td>'+value.date+'</td><td class="red-text">'+value.status_name+'</td><td><div class="btn-group custom-dropdown ml-2 mb-1"><button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button><form method="post">@csrf<div class="dropdown-menu custom-dropdown"><form method="post">@csrf<a href="userregistrationdetails/'+ value.id +'" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a></form><a class="dropdown-item" data-toggle="modal" id="edit-customer" data-target=".editUser" data-id="'+value.id+'" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a><a href="quiz-report.php" class="dropdown-item"><i class="fa fa-file-alt" aria-hidden="true"></i>Quiz Report</a><form action="{{route('user-status-inactive-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "0"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">INACTIVE</button></form><form action="{{route('user-status-active-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "1"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">ACTIVE</button></form></div></div></td></tr></tbody>');
           }

          // $("#name1").append('<input type="number" name="category_id[]" id="name" value="'+ value.category_id +'"/>');
          // $("#name2").append('<input type="number" name="category_id[]" id="name" value="'+ value.category_id +'"/>');
        });
      }else{
        $(".striped").empty();
      }
      }
    });
    }else{
        $("#ajax_table").show();
  }
  });
});
</script>

<script type="text/javascript">
     jQuery(function() {
      jQuery("#datepicker1, #datepicker2, #company_filter, #status_filter").change(function() {
     var date_from = $('#datepicker1').val();
     var date_to = $('#datepicker2').val();
     var company_id = $('#company_filter').val();
     var status_id = $('#status_filter').val();
     if(date_from=="" || date_to=="" || company_id==0 || status_id==0  ){
     jQuery.ajax({
      url: "{{url('/admin/userregistration/getfilterrecords/getdate')}}?date_from=&&date_to=&&company_id=&&status_id=",
      type: "GET",
      data: {
        "date_from": date_from,
        "date_to": date_to,
        "company_id": company_id,
        "status_id": status_id,
      },
       success:function(res){
      if(res){
        $("#orignal_table").addClass('hide');
        $("#ajax_table").empty();
        console.log(res)
        $(".striped").append('<thead><tr><th>S.NO</th><th>USER_ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAILADDRESS</th><th>TRAINING NAME</th><th>COMPANY NAME</th><th>DATE</th><th>STATUS</th><th>Action</th></tr></thead>');
        $.each(res,function(key,value){
           $(".striped").append('<tbody><tr><td>'+ value.user_id +'</td><td>'+ value.firstname +'</td><td>'+ value.email.substr(0, 20) +'</td><td value="'+ key +'">'+ value.lastname +'</td><td>'+value.email+'</td><td>'+value.training_name+'</td><td>'+value.company_name+'</td><td>'+value.date+'</td>'if(value.status=="1"){'<td class="green-text">'+value.status_name+'</td>'}else{'<td class="red-text">'+value.status_name+'</td>'}'<td><div class="btn-group custom-dropdown ml-2 mb-1"><button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button><form method="post">@csrf<div class="dropdown-menu custom-dropdown"><form method="post">@csrf<a href="userregistrationdetails/'+ value.id +'" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a></form><a class="dropdown-item" data-toggle="modal" id="edit-customer" data-target=".editUser" data-id="'+value.id+'" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a><a href="quiz-report.php" class="dropdown-item"><i class="fa fa-file-alt" aria-hidden="true"></i>Quiz Report</a><form action="{{route('user-status-inactive-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "0"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">INACTIVE</button></form><form action="{{route('user-status-active-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "1"><input type="hidden" name="id" value = "'+value.id+'"><button type = "submit" class = "dropdown-item text-center">ACTIVE</button></form></div></div></td></tr></tbody>');

          // $("#name1").append('<input type="number" name="category_id[]" id="name" value="'+ value.category_id +'"/>');
          // $("#name2").append('<input type="number" name="category_id[]" id="name" value="'+ value.category_id +'"/>');
        });
      }else{
        $(".striped").empty();
      }
      }
    });
    }else{
        $("#ajax_table").show();
  }
  });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function ()
{
        jQuery('select[name="training_id"]').empty();
        jQuery('select[name="category_id"]').on('change',function(){
            jQuery('select[name="training_id"]').empty();
           var category_id = jQuery(this).val();
           console.log(category_id);
           jQuery('select[name="training_id"]').empty();
              jQuery.ajax({
                 url : '/admin/userregistration/gettrainingsedit/' +category_id,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="training_id"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="training_id"]').append('<option value="' + value.id + '">' + value.training_name + '</option>');
                     });
                    
                 }
              });
        });
});

jQuery(document).ready(function ()
{
        jQuery('select[name="company_id"]').empty();
        jQuery('select[name="category_id"]').on('change',function(){
            jQuery('select[name="company_id"]').empty();
           var category_id = jQuery(this).val();
           console.log(category_id);
           jQuery('select[name="company_id"]').empty();
              jQuery.ajax({
                 url : '/admin/userregistration/getcompaniesedit/' +category_id,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="company_id"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="company_id"]').append('<option value="' + value.id + '">' + value.company_name + '</option>');
                     });
                    
                 }
              });
        });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function ()
{
        jQuery('select[name="training_id_edit"]').empty();
        jQuery('select[name="category_id_edit"]').on('change',function(){
            jQuery('select[name="training_id_edit"]').empty();
           var category_id = jQuery(this).val();
           console.log(category_id);
           jQuery('select[name="training_id_edit"]').empty();
              jQuery.ajax({
                 url : '/admin/userregistration/gettrainingsedit/' +category_id,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="training_id_edit"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="training_id_edit"]').append('<option value="' + value.id + '">' + value.training_name + '</option>');
                     });
                    
                 }
              });
        });
});

jQuery(document).ready(function ()
{
        jQuery('select[name="company_id_edit"]').empty();
        jQuery('select[name="category_id_edit"]').on('change',function(){
            jQuery('select[name="company_id_edit"]').empty();
           var category_id = jQuery(this).val();
           console.log(category_id);
           jQuery('select[name="company_id_edit"]').empty();
              jQuery.ajax({
                 url : '/admin/userregistration/getcompaniesedit/' +category_id,
                 type : "GET",
                 dataType : "json",
                 success:function(data) {
                     console.log(data);
                     jQuery('select[name="company_id_edit"]').empty();
                     jQuery.each(data, function (key, value) {
                         $('select[name="company_id_edit"]').append('<option value="' + value.id + '">' + value.company_name + '</option>');
                     });
                    
                 }
              });
        });
});
</script>


@endsection

<script>
error=false

function validate()
{
    if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
        document.custForm.btnsave.disabled=false
    else
        document.custForm.btnsave.disabled=true
}
</script>

