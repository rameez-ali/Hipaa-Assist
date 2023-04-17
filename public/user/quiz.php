<?php 
  $pg='quiz';
  $title = "Quiz";
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
                <h5><a href="training-view.php"><i class="fas fa-angle-left"></i></a> Quiz</h5>
                <div class="quiz-inner p-xl-5 p-4">
                    <div class="timer mt-3">
                        <h6 class="sm-heading"><i class="far fa-clock mr-2"></i> Timer: 30:00</h6>
                    </div>
                    <div class="resource-inner-card mr-2 mt-4 py-3">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 text-center my-auto">
                                <img src="images/quiz.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-xl-9 col-lg-8 mt-2">
                                <p class="l-grey-text mb-0">Q1:  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore?</p>
                                <div class="mt-2">
                                    <p class="mb-1">
                                        <input type="radio" id="test3" name="radio-group" checked="">
                                        <label for="test3" class="grey-text">Option 1</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test4" name="radio-group">
                                        <label for="test4" class="grey-text">Option 2</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test5" name="radio-group" checked="">
                                        <label for="test5" class="grey-text">Option 3</label>
                                    </p>
                                    <p class="mb-1">
                                        <input type="radio" id="test6" name="radio-group">
                                        <label for="test6" class="grey-text">Option 4</label>
                                    </p>
                                    <p class="p-sm mb-0"><i class="fas fa-exclamation-circle red-text"></i> Wrong Answer. You have one more attempt. </p>
                                    <button class="site-btn green-btn px-5 py-2 mt-3" data-toggle="modal" data-target=".quizResult">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade quizResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content site-modal">
                    <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

                    <div class="text-center">
                        <div class="modal-icon-div">
                            <i class="fas fa-trophy modal-icon yellow-back"></i>
                        </div>
                        <h6 class="d-grey-text sm-heading">Congratulations!</h6>
                        <p class="grey-text medium sm-heading">You Had 40/50 Correct Answers And You Have Passed This Quiz.</p>
                        <div class="d-flex justify-content-center">
                            <button class="redo-btn mr-4 round-btn">
                                <i class="fas fa-redo"></i>
                            </button>
                            <button class="save-btn mr-4 round-btn">
                                <i class="fas fa-file-alt"></i>
                            </button>
                            <button class="star-btn round-btn">
                                <i class="fas fa-certificate"></i>
                            </button>
                        </div>
                        <p class="grey-text medium sm-heading">Attempts Remaining: 1</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- inner page ends here -->

        <?php include('site-footer.php') ?>
    </div>

    <div class="overlay"></div>

<?php include('footer.php') ?>