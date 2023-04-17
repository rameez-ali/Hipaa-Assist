<?php 
  $pg='training';
  $title = "My Trainings";
  include('header.php');
?>

    <div class="wrapper">
        <?php include('mobile-navigation.php') ?>
        <hr class="my-0">

        <!-- inner page starts here -->
        <section class="inner-page my-trainings">
            <img src="images/triangle.png   " alt="" class="img-fluid inner-img-1">
            <img src="images/circle.png" alt="" class="img-fluid inner-img-2">
            <img src="images/circle-sm.png" alt="" class="img-fluid inner-img-3">
            <img src="images/arrow.png" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <h4>My Trainings</h4>
                <div class="d-flex justify-content-end align-items-center">
                    <p class="p-sm m-grey-text mb-0 mr-3">Filter</p>
                    <select name="" id="" class="site-input p-3 w-25">
                        <option value="">Select Status</option>
                        <option value=""></option>
                    </select>
                </div>
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
                            <tr>
                                <td>01</td>
                                <td>james.milner@gmail.com</td>
                                <td>Abc Training</td>
                                <td>$100</td>
                                <td><p class="mb-0 status-tag orange-tag">Inprocess</p></td>
                                <td>
                                    <div class="btn-group custom-dropdown ml-2">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown"> 
                                            <a href="training-details.php" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>james.milner@gmail.com</td>
                                <td>Abc Training</td>
                                <td>$100</td>
                                <td><p class="mb-0 status-tag green-tag">Passed</p></td>
                                <td>
                                    <div class="btn-group custom-dropdown ml-2">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown"> 
                                            <a href="training-details.php" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>james.milner@gmail.com</td>
                                <td>Abc Training</td>
                                <td>$100</td>
                                <td><p class="mb-0 status-tag red-tag">Failed</p></td>
                                <td>
                                    <div class="btn-group custom-dropdown ml-2">
                                        <button type="button" class="btn btn-drop-table btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu custom-dropdown"> 
                                            <a href="training-details.php" class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>