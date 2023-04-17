<?php 
  $pg='landing';
  $title = "Landing Page";
  include('header.php');
?>

    <div class="wrapper">
        <?php include('mobile-navigation.php') ?>

        <!-- banner section starts here -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <h1>Business Training</h1>
                        <p class="m-grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        <button class="site-btn green-btn py-2 px-5" data-toggle="modal" data-target=".paymentMethod">Pay</button>
                    </div>
                    <div class="col-lg-8 py-5">
                        <img src="images/banner.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <img src="images/circle.png" alt="" class="img-fluid banner-circle">
            <img src="images/triangle-comp.png" alt="" class="img-fluid banner-triangle">
        </section>
        <!-- banner section ends here -->
        
        <!-- explainer section starts here -->
        <section class="explainer">
            <div class="container px-lg-5">
                <h3>Explainer Video</h3>
                <img src="images/banner-video.png" alt="" class="img-fluid mt-4 w-100" data-toggle="modal" data-target=".viewVideo">
            </div>
            <img src="images/arrow.png" alt="" class="img-fluid banner-circle">
            <img src="images/circle-sm.png" alt="" class="img-fluid banner-triangle">
        </section>
        <!-- explainer section ends here -->

        <div class="modal fade paymentMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <h6>Payment</h6>
                        <p class="p-lg bold grey-text">Choose A Payment Method</p>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary left-round px-4 py-2 active">
                                <input type="radio" name="options" id="option1" checked> Credit/Debit Card
                            </label>
                            <label class="btn btn-secondary right-round px-5 py-2">
                                <input type="radio" name="options" id="option2"> Visa Card
                            </label>
                        </div>
                        <div class="pay-card mt-4 mx-lg-5">
                            <div class="d-flex justify-content-between align-items-center p-4">
                                <div>
                                    <p class="p-sm bold mb-0">Training Name</p>
                                    <h4>$938</h4>
                                </div>
                                <img src="images/payment.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <form action="#_">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" class="site-input mt-5 w-100 py-3" placeholder="Card Holder Name">
                                        <input type="number" class="site-input w-100 mt-3 py-3" placeholder="Card Number">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" class="site-input w-100 mt-3 py-3" placeholder="CVV">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="site-input w-100 mt-3 py-3" placeholder="Expiry Date">
                                    </div>
                                    <div class="col-12">
                                        <p class="mt-3">
                                            <input type="checkbox" id="c1" name="cb">
                                            <label for="c1" class="m-grey-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button data-toggle="modal" data-target=".paymentSuccessful" data-dismiss="modal" aria-label="Close" class="site-btn d-inline-block mt-4 py-3 px-5">Continue</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade paymentSuccessful" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

                    <div class="text-center">
                        <div class="modal-icon-div">
                            <i class="fas fa-check modal-icon"></i>
                        </div>
                        <h6 class="grey-text">Payment Successful</h6>
                        <a href="landing-page.php" class="site-btn d-inline-block mt-4 py-3 px-5">Okay</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade viewVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/EngW7tLk6R8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>


        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>