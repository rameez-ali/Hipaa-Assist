<?php 
  $pg='profile';
  $title = "User Profile";
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
                    <div class="col-xl-2 col-lg-3"><img src="images/profile-img.png" alt="" class="img-fluid"></div>
                    <div class="col-xl-8 mt-4 col-lg-9">
                        <h4>My Profile</h4>
                        <div class="row">
                            <div class="col-5 mt-4">
                                <p class="l-grey-text">First Name</p>
                                <p class="l-grey-text">Last Name</p>
                                <p class="l-grey-text">Email</p>
                                <p class="l-grey-text">Contact No</p>
                                <p class="l-grey-text mb-2">Company Name</p>
                            </div>
                            <div class="col-7 mt-4">
                                <p class="d-grey-text">Mark</p>
                                <p class="d-grey-text">Carson</p>
                                <p class="d-grey-text">mark.carson@gmail.com</p>
                                <p class="d-grey-text">+1234567890</p>
                                <p class="d-grey-text mb-2">ABC Company</p>
                            </div>
                        </div>
                        <a href="edit-profile.php" class="d-inline-block site-btn green-btn px-5 mt-5 py-2">Edit</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>