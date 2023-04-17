@include('user.layouts.app')

    <div class="wrapper">
      @include('user.layouts.mobile-navigation')
        <hr class="my-0">

        <!-- inner page starts here -->
        <section class="inner-page my-trainings">
            <img src="images/triangle.png   " alt="" class="img-fluid inner-img-1">
            <img src="images/circle.png" alt="" class="img-fluid inner-img-2">
            <img src="images/circle-sm.png" alt="" class="img-fluid inner-img-3">
            <img src="images/arrow.png" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <h4>My Trainings</h4>
               <!--  <div class="d-flex justify-content-end align-items-center">
                    <p class="p-sm m-grey-text mb-0 mr-3">Filter</p>
                    <select name="" id="" class="site-input p-3 w-25">
                        <option value="">Select Status</option>
                        <option value=""></option>
                    </select>
                </div> -->
                <div class="maain-tabble table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Email</th>
                                <th>training Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($my_trainings as $my_training)
                            <tr>
                                <td>{{$my_training->id}}</td>
                                <td>{{$my_training->vendors->email}}</td>
                                <td>{{$my_training->trainings->training_name}}</td>
                                <td>{{$my_training->vendors->amount}}</td>
                                @if($my_training->exam_status==1)
                                <td><p class="status-tag green-tag mb-0">Pass</p></td>
                                @elseif($my_training->exam_status==2)
                                <td><p class="status-tag red-tag mb-0">Fail</p></td>
                                @else
                                <td><p class="status-tag orange-tag mb-0">Incomplete</p></td>
                                @endif
                                <td>
                                    <div class="btn-group custom-dropdown ml-2">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown"> 
                                            <a href="{{url('vendor/trainings/'.$my_training->id)}}" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!-- inner page ends here -->

      @include('user.layouts.site-footer')
    </div>

    <div class="overlay"></div>

@include('user.layouts.footer')
