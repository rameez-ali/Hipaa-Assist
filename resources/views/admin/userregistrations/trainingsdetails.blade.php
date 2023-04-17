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
                                            <a href="user-registration.php"><h1 class="mb-2 ml-2"><i class="fas fa-angle-left"></i> Training Logs</h1></a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="clearfix"></div>
                                    <div class="row ml-0 mr-0">
                                        <div class="mt-3 col-12">
                                            <label  for="">Sort By:</label>
                                        </div>
                                        <div class="d-sm-flex">
                                                   <input id="datepicker1"  type="text" class="site-input site-select ml-sm-1 mt-1 mt-sm-0 border px-2" readonly placeholder="From" type="text">
                                                    <input id="datepicker2"  type="text" class="site-input site-select ml-sm-1 mt-1 mt-sm-0 border px-2" readonly placeholder="To" type="text">
                                       </div>
                                    </div>

                                    <div class="maain-tabble table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration striped" id="ajax_table">
                                            <thead>
                                                <tr>
                                                    <th>S.NO</th>
                                                    <th>User Id</th>
                                                    <th>Training NAME</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users_trainings as $vendor)
                                                <tr>
                                                    <td>{{$vendor->id}}</td>
                                                    <td>{{$vendor->user_id}}</td>
                                                    <td>{{$vendor->training_name}}</td>
                                                    <td>{{$vendor->category_name}}</td>
                                                    @if($vendor->status=="1")
                                                    <td class="green-text">Active</td>
                                                    @else
                                                    <td class="red-text">In Active</td>
                                                    @endif
                                                    <td>
                                                        <div class="btn-group custom-dropdown ml-2 mb-1">
                                                            <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                                            <div class="dropdown-menu custom-dropdown"> 
                                                            <form method="post">
                                                                @csrf 
                                                                <a href="{{ url('/admin/userregistration/usertrainingdetails/'.$vendor->training_id)}}" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                                            </form>
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

<script type="text/javascript">
     jQuery(function() {
      jQuery("#datepicker1, #datepicker2").change(function() {
     var date_from = $('#datepicker1').val();
     var date_to = $('#datepicker2').val();
     if(date_from!=0 && date_to!=0 ){
     jQuery.ajax({
      url: "{{url('/admin/userregistration/getlogsfilterrecords/getdate')}}?date_from=&&date_to=",
      type: "GET",
      data: {
        "date_from": date_from,
        "date_to": date_to,
      },
       success:function(res){
      if(res){
        $("#orignal_table").addClass('hide');
        $("#ajax_table").empty();
        console.log(res)
        $(".striped").append('<thead><tr><th>S.NO</th><th>USER_ID</th><th>TRAINING NAME</th><th>CATEGORY</th><th>DATE</th><th>STATUS</th><th>Action</th></tr></thead>');
        $.each(res,function(key,value){
           $(".striped").append('<tbody><tr><td>'+ value.id +'</td><td>'+ value.user_id +'</td><td>'+ value.training_name +'</td><td>'+ value.category_name +'</td><td>'+value.date+'</td><td class="green-text">'+value.status_name+'</td><td><div class="btn-group custom-dropdown ml-2 mb-1"><button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button><form method="post">@csrf<div class="dropdown-menu custom-dropdown"><form method="post">@csrf<a href="/admin/userregistration/usertrainingdetails/'+ value.training_id +'" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a></form><a class="dropdown-item" data-toggle="modal" id="edit-customer"data-target=".editUser" data-id="'+value.id+'" ><i class="fa fa-edit" aria-hidden="true"></i>Edit</a><a href="quiz-report.php" class="dropdown-item"><i class="fa fa-file-alt" aria-hidden="true"></i>Quiz Report</a><form action="{{route('user-status-inactive-update')}}" method = "post">@csrf<input type="hidden" name="status" value = "0"><input type="hidden" name="id" value = "'+value.id+'"><input type="hidden" name="id" value = "'+value.id+'"></form></div></div></td></tr></tbody>');
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

@endsection
