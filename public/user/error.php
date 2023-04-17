<?php 
  $pg='error';
  $title = "Page Not Found";
  include('header.php');
?>

    <div class="wrapper">
        <?php include('mobile-navigation.php') ?>
        <hr class="my-0">

        <!-- inner page starts here -->
        <section class="inner-page error">
            <img src="images/triangle.png   " alt="" class="img-fluid inner-img-1">
            <img src="images/circle.png" alt="" class="img-fluid inner-img-2">
            <img src="images/circle-sm.png" alt="" class="img-fluid inner-img-3">
            <img src="images/arrow.png" alt="" class="img-fluid inner-img-4">
            <div class="container text-center">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 mx-auto">
                        <img src="images/error.png" alt="" class="img-fluid">
                        <h5 class="green-text">Oops, This Page Could Not Be Found!</h5>
                        <p class="d-grey-text mt-3">The page you are looking for does not appear to exist. Please go back or head on over our homepage to choose a new direction.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>