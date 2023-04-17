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
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/CustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" href="{{ asset('assets/css/style.css') }}"></script>
<script  src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" ></script> 
<script  src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script> 
<script  src="{{ asset('app-assets/js/core/app-menu.js') }}" ></script> 
<script  src="{{ asset('app-assets/js/core/app.js') }}" ></script> 
<script  src="{{ asset('app-assets/js/scripts/customizer.js') }}" ></script> 
<script  src="{{ asset('assets/js/chart.js') }}" ></script> 
<script  src="{{ asset('assets/js/jquery.repeater.min.js') }}" ></script> 
<script  src="{{ asset('assets/js/form-repeater.js') }}" ></script> 
<script  src="{{ asset('assets/js/chart.js') }}"></script> 
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

<script src="app-assets/js/scripts/modal/components-modal.js" ></script> 
<script src="./assets/js/intlTelInput.js"></script> 
<script src="assets/js/function.js" ></script> 
</head>
<body>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>