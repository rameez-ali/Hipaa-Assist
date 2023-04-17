<?php 
  $pg='training';
  $title = "Training Details";
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
                <div class="pb-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="my-trainings.php"><h5 class="mb-0"><i class="fas fa-angle-left"></i> Business Trainings</h5></a>
                        <div class="d-flex align-items-center">
                            <p class="p-sm mb-0 bold mr-2">Status</p>
                            <p class="status-tag green-tag mb-0">Completed</p>
                        </div>
                    </div>
                    <p class="p-lg bold green-text">Category Abc</p>
                    <img src="images/training-details.png" alt="" class="img-fluid w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="d-grey-text mt-4">Descriptions</h5>
                        <p class="status-tag green-tag mb-0">Passed: 40/50</p>
                    </div>
                    <h6 class="sm-heading blue-text">Amount: $100</h6>
                    <p class="grey-text mt-3">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet</p>
                    <div class="d-sm-flex">
                        <button class="site-btn green-btn px-5 mr-2 py-2 mt-4" data-toggle="modal" data-target=".printCertificate">View Certificate</button>
                        <button class="site-btn px-4 py-2 mt-4">Download Certificate</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- inner page ends here -->

        
        <div class="modal fade printCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <img src="images/certificate.png" alt="" class="img-fluid w-100">
                        <button class="site-btn d-inline-block mt-4 py-2 px-5">Download</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>