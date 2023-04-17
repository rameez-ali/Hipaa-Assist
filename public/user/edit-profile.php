<?php 
  $pg='profile';
  $title = "Edit Profile";
  include('header.php');
?>

    <div class="wrapper">
        <?php include('mobile-navigation.php') ?>
        <hr class="my-0">

        <!-- inner page starts here -->
        <section class="inner-page user-profile">
            <img src="images/triangle.png   " alt="" class="img-fluid inner-img-1">
            <img src="images/circle.png" alt="" class="img-fluid inner-img-2">
            <img src="images/circle-sm.png" alt="" class="img-fluid inner-img-3">
            <img src="images/arrow.png" alt="" class="img-fluid inner-img-4">
            <div class="container text-center text-lg-left">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <div class="edit-img">
                            <img src="images/profile-img.png" alt="" class="img-fluid">
                            <form action="#type your action here" method="POST" enctype="multipart/form-data" name="myForm">
                                <div id="yourBtn" onclick="getFile()">
                                    <div class="camera-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div style="height: 0px;width: 0px; overflow:hidden;"><input id="upfile" type="file" value="upload" onchange="sub(this)"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8 mt-4 pl-xl-5 col-lg-9">
                        <h4>My Profile</h4>
                        <form action="user-profile.php">
                            <div class="row align-items-center">
                                <div class="col-5 mt-4">
                                    <p class="l-grey-text mb-0">First Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input type="text" value="Mark" class="site-input py-2 w-100 px-lg-4 px-2">
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text mb-0">Last Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input type="text" value="Carson" class="site-input py-2 w-100 px-lg-4 px-2">
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text mb-0">Email</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <input type="email" value="mark.carson@gmail.com" class="site-input py-2 w-100 px-lg-4 px-2">
                                </div>
                                <div class="col-5 mt-3">
                                    <p class="l-grey-text">Contact No</p>
                                    <p class="l-grey-text mb-2">Company Name</p>
                                </div>
                                <div class="col-7 mt-3">
                                    <p class="d-grey-text">+1234567890</p>
                                    <p class="d-grey-text mb-2">ABC Company</p>
                                </div>
                            </div>
                            <button class="site-btn green-btn px-5 mt-5 py-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>