        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss" class="shadow-sm">
                <i class="fas fa-times"></i>
            </div>

            <div class="sidebar-header">
                <a href="landing-page.php"><img src="images/logo.png" alt="" class="logo"></a>
            </div>
            <hr>

            <ul class="list-unstyled components">
                <li class="medium <?php if ($pg=="home") {echo "active"; } else  {echo "";}?>"">
                    <a href="landing-page.php">Home</a>
                </li>
                <li class="medium <?php if ($pg=="about-us") {echo "active"; } else  {echo "";}?>"">
                    <a href="#_">Visit HIPAA ASSIST Website</a>
                </li>
                <li class="p-0 medium <?php if ($pg=="affiliate-login") {echo "active"; } else  {echo "";}?>" ">
                    <a href="contact.php">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-12 px-0 mx-auto">
                        <nav class="navbar navbar-expand-lg">
                            <a href="landing-page.php"><img src="images/logo.png" alt="" class="img-fluid logo ml-3 ml-sm-0"></a>
                            <li class="dropdown user-drop no-hover d-lg-none d-block dropdown-user mx-md-3 nav-item"> 
                                <a class="dropdown-toggle d-flex align-items-center p-0 nav-link no-hover dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false"> 
                                    <span class="avatar avatar-online"> 
                                        <img src="images/profile-img.png" alt="avatar"> 
                                    </span> 
                                    <span class="user-name black-text mb-0">Mark Will</span> 
                                </a>
                                <div class="dropdown-menu profile-cont dropdown-menu-right">
                                    <a class="dropdown-item no-hover" href="user-profile.php"><i class="fas fa-angle-right mr-3"></i>My Profile</a>
                                    <a class="dropdown-item no-hover" href="my-trainings.php"><i class="fas fa-angle-right mr-3"></i>My Trainings</a>
                                    <hr class="my-2">
                                    <a class="dropdown-item no-hover" data-toggle="modal" data-target=".logOut"><i class="fas fa-angle-right mr-3"></i>Logout</a>
                                </div>
                            </li>
                            <button type="button" id="sidebarCollapse" class="btn d-inline-block d-lg-none mr-3 mr-sm-0 red-back">
                                <i class="fas fa-align-justify"></i>
                            </button>
                            <!-- <button class="btn btn-dark d-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button> -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="medium mr-3 <?php if ($pg=="home") {echo "active"; } else  {echo "";}?>"">
                                        <a href="landing-page.php">Home</a>
                                    </li>
                                    <li class="medium mx-3 <?php if ($pg=="about-us") {echo "active"; } else  {echo "";}?>"">
                                        <a href="#_">Visit HIPAA ASSIST Website</a>
                                    </li>
                                    <li class="mx-3 p-0 medium <?php if ($pg=="affiliate-login") {echo "active"; } else  {echo "";}?>" ">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li class="dropdown no-hover dropdown-user mx-3 nav-item"> 
                                        <a class="dropdown-toggle d-flex align-items-center p-0 nav-link no-hover dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false"> 
                                            <span class="avatar avatar-online"> 
                                                <img src="images/profile-img.png" alt="avatar"> 
                                            </span> 
                                            <span class="user-name black-text mb-0">Mark Will</span> 
                                        </a>
                                        <div class="dropdown-menu profile-cont dropdown-menu-right">
                                            <a class="dropdown-item no-hover" href="user-profile.php"><i class="fas fa-angle-right mr-3"></i>My Profile</a>
                                            <a class="dropdown-item no-hover" href="my-trainings.php"><i class="fas fa-angle-right mr-3"></i>My Trainings</a>
                                            <hr class="my-2">
                                            <a class="dropdown-item no-hover" data-toggle="modal" data-target=".logOut"><i class="fas fa-angle-right mr-3"></i>Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
