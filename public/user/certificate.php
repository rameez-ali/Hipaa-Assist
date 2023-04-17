<?php 
  $pg='certificate';
  $title = "Certificate";
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
            <div class="container text-center">
                <div class="quiz-inner p-xl-5 p-4">
                    <i class="modal-icon yellow-back fas fa-trophy"></i>
                    <h4 class="mt-4">Congratulations</h4>
                    <p class="p-lg bold grey-text">Exam Score: You got 14 out of 15 correct for a score of 93.3%.</p>
                    <p class="p-lg bold grey-text">Enter your name as you want to appear on your certificate:</p>
                    <input type="text" class="site-input green-text py-3 text-center bold" value="Mark Carson">
                    <p class="p-lg bold grey-text mt-3">and Email a copy to me at: markcarson@gmail.com</p>
                    <div class="mt-4 pb-5">
                        <button class="site-btn py-2 px-5">Generate Certificate</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>