<?php 
  $pg='login';
  $title = "Login";
  include('header.php');
?>

    <div class="wrapper">

        <header class="py-4">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#_"><img src="images/logo.png" alt="" class="img-fluid logo"></a>
                    <a href="contact-us.php" class="site-btn px-md-5 px-4 py-md-3 py-2">Contact Us</a>
                </div>
            </div>
        </header>

        <!-- signup section starts here -->
        <section class="login-bg">
            <div class="container-fluid px-0">
                <div class="login-card">
                    <div class="row ml-0 mr-0">
                        <div class="col-md-6 col-12 login-left-col">
                            <h2>The Best <br> Online Training Education <br> Starts Here</h2>
                            <p class="bold">Copyright © 2021. HIPAA ASSIST</p>
                        </div>
                        <div class="col-md-6 col-12 login-right-col">
                            <div class="position-relative">
                                <div class="login-right-content">
                                    <h4 class="text-center mt-5">Sign In</h4>
                                    <div class="form-field mt-5">
                                        <input type="number" class="site-input w-100 py-3" placeholder="Phone Number" name="" id="">
                                    </div>
                                    <div class="text-center">
                                        <button class="site-btn mx-auto green-btn py-3 px-5 mt-4">Skip</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>