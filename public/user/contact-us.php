<?php 
  $pg='contact';
  $title = "Contact Us";
  include('header.php');
?>

    <div class="wrapper">

        <header class="py-4">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="#_"><img src="images/logo.png" alt="" class="img-fluid logo"></a>
                    <a href="login.php" class="site-btn px-md-5 px-4 py-md-3 py-2">Sign In</a>
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
                                    <h4 class="text-center mt-5">Contact Us</h4>
                                    <div class="row">
                                        <div class="col-lg-6 pr-1">
                                            <div class="form-field mt-lg-4 mt-3">
                                                <input type="text" class="site-input w-100 py-3" placeholder="First Name" name="" id="">
                                            </div>    
                                        </div>
                                        <div class="col-lg-6 pl-1">
                                            <div class="form-field mt-lg-4 mt-3">
                                                <input type="text" class="site-input w-100 py-3" placeholder="Last Name" name="" id="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-field mt-3">
                                                <input type="email" class="site-input w-100 py-3" placeholder="Email Address" name="" id="">
                                            </div>
                                            <select name="" class="w-100 site-input py-3 mt-3" id="">
                                                <option value="">Category</option>
                                            </select>
                                            <select name="" class="w-100 site-input py-3 mt-3" id="">
                                                <option value="">Training</option>
                                            </select>
                                            <textarea name="" id="" placeholder="Message" cols="30" rows="5" class="w-100 mt-3 p-3 site-input"></textarea>
                                        </div>
                                    </div>
                                    <p class="mt-4">
                                        <input type="checkbox" id="c1" name="cb">
                                        <label for="c1" class="bold">Remember Me</label>
                                    </p>
                                    <div class="text-center">
                                        <form action="contact-us.php">
                                            <button type="submit" class="site-btn mx-auto green-btn py-3 px-5 mt-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- signup section ends here -->
                
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>