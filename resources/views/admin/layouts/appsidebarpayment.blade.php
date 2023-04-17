<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> HIPAA ASSIST | <?php echo ((isset($title))?$title:'Dashboard'); ?> </title>
    <link rel="shortcut icon" href="./images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/css/vendors.css') }}" >
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <!-- END Page Level CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/calendars/fullcalendar.css') }}" >
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/calendars/fullcalendar.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/CustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    


</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar "
 <!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"> <a class="navbar-brand logo-div" href="{{route('admin.dashboard')}}"> <img class="brand-logo img-fluid"
                            alt="stack admin logo" src="{{asset('images/logo.png')}}"> </a> </li>
                <li class="nav-item d-md-none"> <a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a> </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-notification nav-item two-bell-icons">
                        <a class="nav-link pr-0 nav-link-label" href="#" data-toggle="dropdown">
                          <i class="fa fa-bell" aria-hidden="true"></i> 
                          <span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="scrollable-container media-list ps-container ps-theme-dark ps-active-y"
                                data-ps-id="75e644f2-605d-3ecc-f100-72d86e4a64d8">
                                <a href="notifications.php">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-1 bell-circle">
                                            <i class="fas blue-text fa-bell notifications-bell"></i>
                                        </div>
                                        <div class="media-body">
                                            <!-- <h6 class="media-heading">You have new notification!</h6> -->
                                            <p class="notification-text p-sm grey-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consete tur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
                                            <div class="notification-below-info">
                                                <p class="green-text mb-0">10 mins ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="notifications.php">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-1 bell-circle">
                                            <i class="fas blue-text fa-bell notifications-bell"></i>
                                        </div>
                                        <div class="media-body">
                                            <!-- <h6 class="media-heading">You have new notification!</h6> -->
                                            <p class="notification-text p-sm grey-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consete tur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
                                            <div class="notification-below-info">
                                                <p class="green-text mb-0">10 mins ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="notifications.php">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-1 bell-circle">
                                            <i class="fas blue-text fa-bell notifications-bell"></i>
                                        </div>
                                        <div class="media-body">
                                            <!-- <h6 class="media-heading">You have new notification!</h6> -->
                                            <p class="notification-text p-sm grey-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consete tur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
                                            <div class="notification-below-info">
                                                <p class="green-text mb-0">10 mins ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a
                                    class="dropdown-item notification blue-text text-muted text-center"
                                    href="notifications.php">View All Notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item d-flex align-items-center"> 
                        <a class="dropdown-toggle nav-link dropdown-user-link"  data-toggle="dropdown"> 
                            <span class="avatar avatar-online"> 
                                <img src="{{asset('images/profile-img.png')}}" alt="avatar"> 
                            </span> 
                            <span class="user-name mb-0">{{auth()->user()->firstname}}</span> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-uppercase grey-text" href="{{route('getmyprofile')}}"><i class="fas fa-angle-right"></i>My Profile</a>
                            <hr class="my-0">
                            <a class="dropdown-item text-uppercase grey-text" data-toggle="modal" data-target=".logoutModal"><i class="fas fa-angle-right"></i>Logout</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a></li>
            <li class="nav-item"><a
                href="{{route('trainings.index')}}"><i class="fas fa-file-alt"></i><span class="menu-title"
                data-i18n="">Trainings</span></a></li>
            <li class="nav-item "><a href="{{route('userregistration.index')}}"><i
                        class="fas fa-user-circle"></i><span class="menu-title" data-i18n="">User Registration</span></a></li>
            <li class="nav-item  <?php if ("payment") {echo "active"; } else  {echo "";}?>"><a href="{{route('payment.index')}}"><i
                        class="fas fa-credit-card"></i><span class="menu-title" data-i18n="">Payment Log</span></a></li>
            <li class="nav-item "><a href="{{route('feedback.index')}}" class="d-flex"><i class="custom-icon"><svg width="18.173" height="18.173" viewBox="0 0 18.173 18.173">
  <path id="Icon_material-feedback" data-name="Icon material-feedback" d="M19.356,3H4.817A1.815,1.815,0,0,0,3.009,4.817L3,21.173l3.635-3.635H19.356a1.823,1.823,0,0,0,1.817-1.817V4.817A1.823,1.823,0,0,0,19.356,3ZM13,13.9H11.178V12.086H13Zm0-3.635H11.178V6.635H13Z" transform="translate(-3 -3)" fill="#fff"/>
</svg>
</i><span class="menu-title" data-i18n="">Feedback</span></a></li>
        </ul>
    </div>
</div>


<!-- Logout Modal -->
<div class="modal fade logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content site-modal">
            <i class="fas fa-times-circle close modal-close" data-dismiss="modal" aria-label="Close"></i>

            <div class="text-center">
                <div class="modal-icon-div">
                    <i class="fas fa-sign-out-alt yellow-text"></i>
                </div>
                <p class="modal-text grey-text">Are you sure you want to Logout ?</p>
                <div class="modal-btn-div">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                <button type="submit" class="login-btn px-3" href="{{route('admin.logout')}}">Yes</button>
                @csrf
                </form>
                    <a class="site-btn" data-dismiss="modal" aria-label="Close">No</a>
                </div>
            </div>
        </div>
    </div>
</div>

        <main class="py-4">
            @yield('content')

        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script  src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" ></script> 
<script  src="{{ asset('app-assets/js/core/app-menu.js') }}" ></script> 

<!-- <script  src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>  -->

<script  src="{{ asset('app-assets/js/core/app.js') }}" ></script> 
<script  src="{{ asset('app-assets/js/scripts/customizer.js') }}" ></script> 
<script  src="{{ asset('assets/js/chart.js') }}" ></script> 
<script  src="{{ asset('assets/js/jquery.repeater.min.js') }}" ></script> 
<script  src="{{ asset('assets/js/form-repeater.js') }}" ></script> 
<!-- <script  src="{{ asset('assets/js/chart.js') }}"></script>  -->
<script  src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>

<script  src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script  src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" ></script> 
<script  src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" ></script> 
<script  src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.js') }}" ></script> 
<script  src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script> 
<script  src="{{ asset('app-assets/js/scripts/charts/chartjs/line/line.js') }}"></script> 
<script  src="{{ asset('app-assets/js/scripts/charts/chartjs/line/line-area.js') }}"></script> 
<!-- <script src="app-assets/js/scripts/charts/chartjs/line/line-logarithmic.js"></script> -->
<!-- <script src="app-assets/js/scripts/charts/chartjs/line/line-multi-axis.js"></script> -->

<script src="{{asset('app-assets/js/scripts/modal/components-modal.js')}}" ></script> 
<!-- <script src="{{asset('assets/js/intlTelInput.js')}}"></script> 
<script src="{{asset('assets/js/function.js')}}" ></script>  -->

<script>
        // Set paths
        // ------------------------------

        require.config({
            paths: {
                echarts: '../../app-assets/vendors/js/charts/echarts'
            }
        });


        // Configuration
        // ------------------------------

        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                'echarts/chart/scatter',
                'echarts/chart/pie'
            ],


            // Charts setup
            function(ec) {

                // Initialize chart
                // ------------------------------
                var myChart = ec.init(document.getElementById('column-chart'));

                // Chart Options
                // ------------------------------
                chartOptions = {

                    // Setup grid
                    grid: {
                       x: 60,
                        x2: 60,
                        y: 45,
                        y2: 25
                    },

                    // Add tooltip
                    tooltip: {
                        trigger: 'axis'
                    },

                    // Add legend

                    // Add custom colors
                    color: ['#212121', '#476BC4', '#11b04f'],

                    // Enable drag recalculate
                    calculable: true,

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    }],

                    // Vertical axis
                    yAxis: [{
                            type: 'value',
                            // name: 'Water',
                            axisLabel: {
                                formatter: '{value} K'
                            }
                        },
                        {
                            type: 'value',
                            name: 'Temperature',
                            axisLabel: {
                                formatter: '{value} °C'
                            }
                        }
                    ],

                    // Add series
                    series: [{
                            name: 'Evaporation',
                            type: 'bar',
                            data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                        },
                        {
                            name: 'Precipitation',
                            type: 'bar',
                            data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
                        },
                        
                    ]
                };

                // Apply options
                // ------------------------------

                myChart.setOption(chartOptions);


                // Resize chart
                // ------------------------------

                $(function() {

                    // Resize chart on menu width change and window resize
                    $(window).on('resize', resize);
                    $(".menu-toggle").on('click', resize);

                    // Resize function
                    function resize() {
                        setTimeout(function() {

                            // Resize chart
                            myChart.resize();
                        }, 200);
                    }
                });
            }
        );

    </script>
    <script>
         $(document).ready(function () {

            setTimeout(function () {
            $('.preloader').fadeOut(100);
            }, 1000);

        });
    </script>
    
</body>
</html>