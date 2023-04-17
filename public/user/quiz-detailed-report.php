<?php 
  $pg='training';
  $title = "Quiz Detialed Report";
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
                <h4><a href="quiz.php"><i class="fas fa-angle-left"></i></a> Quiz Detailed Report</h4>
                <div class="maain-tabble table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Questions</th>
                                <th>Result</th>
                                <th>Points</th>
                                <th>Awarded</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Q1:</td>
                                <td>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam <br> nonumy eirmod tempor invidunt ut labore?</td>
                                <td><h6 class="mb-0"><i class="fas fa-check-circle green-text"></i></h6></td>
                                <td><input type="number" value="1" class="site-input text-center px-0 py-2 w-50"></td>
                                <td><input type="number" value="1" class="site-input text-center px-0 py-2 w-50"></td>
                            </tr>
                            <tr>
                                <td>Q2:</td>
                                <td>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam <br> nonumy eirmod tempor invidunt ut labore?</td>
                                <td><h6 class="mb-0"><i class="fas fa-times-circle red-text"></i></h6></td>
                                <td><input type="number" value="1" class="site-input text-center px-0 py-2 w-50"></td>
                                <td><input type="number" value="0" class="site-input text-center px-0 py-2 w-50"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        <!-- inner page ends here -->

        <div class="modal fade firstAttempt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <p class="sm-heading medium">You Got 15/50 Answers Correct. Unfortunately, You Have Not Passed This Training. If You Wish To Retake The Quiz You May Try One More Time.</p>
                        <a href="quiz.php" class="site-btn d-inline-block green-btn mr-2 mt-4 py-2 px-4">Reattempt Quiz</a>
                        <a href="my-trainings.php" class="site-btn d-inline-block mt-4 py-2 px-4">Back To Training</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade lastAttempt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>
                    <div class="text-center">
                        <p class="sm-heading medium">You Got 15/50 Answers Correct. Unfortunately, You Have Not Passed This Training. If You Wish To Retake The Quiz You May Try One More Time.</p>
                        <a href="login.php" class="site-btn d-inline-block mt-4 py-2 px-4">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>