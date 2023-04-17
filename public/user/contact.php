<?php 
  $pg='contact';
  $title = "Contact";
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
                <h4>Contact Us</h4>
                <form action="#_">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="row align-items-center">
                                <div class="col-lg-3 mt-3 col-sm-5">
                                    <p class="l-grey-text mb-0">First Name</p>
                                </div>
                                <div class="col-lg-9 mt-3 col-sm-7">
                                    <input type="text" value="Mark" class="site-input py-sm-3 py-2 w-100">
                                </div>
                                <div class="col-lg-3 mt-3 col-sm-5">
                                    <p class="l-grey-text mb-0">Last Name</p>
                                </div>
                                <div class="col-lg-9 mt-3 col-sm-7">
                                    <input type="text" value="Carson" class="site-input py-sm-3 py-2 w-100">
                                </div>
                                <div class="col-lg-3 mt-3 col-sm-5">
                                    <p class="l-grey-text mb-0">Email</p>
                                </div>
                                <div class="col-lg-9 mt-3 col-sm-7">
                                    <input type="email" value="mark.carson@gmail.com" class="site-input py-sm-3 py-2 w-100">
                                </div>
                                <div class="col-lg-3 mt-3 col-sm-5">
                                    <p class="l-grey-text mb-0">Category</p>
                                </div>
                                <div class="col-lg-9 mt-3 col-sm-7">
                                    <select name="" id="" class="site-input py-sm-3 py-2 px-3 w-100">
                                        <option value="">Select Category</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-3 col-sm-5">
                                    <p class="l-grey-text mb-0">Training</p>
                                </div>
                                <div class="col-lg-9 mt-3 col-sm-7">
                                    <select name="" id="" class="site-input py-sm-3 py-2 px-3 w-100">
                                        <option value="">Select Training</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-1 col-sm-5 mt-3">
                                    <p class="l-grey-text mb-0">Message</p>
                                </div>
                                <div class="col-lg-10 col-sm-7 ml-lg-5 mt-3">
                                    <textarea name="" id="" cols="30" rows="7" placeholder="Message" class="w-100 p-sm-3 py-2 site-input"></textarea>
                                    <button class="site-btn mt-4 px-5 py-2 green-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>