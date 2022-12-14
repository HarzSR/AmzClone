<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>AmzClone | {{ \Request::route()->getName() }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{{ url('admin/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core Css -->
    <link href="{{ url('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ url('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ url('admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ url('admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="{{ url('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ url('admin/plugins/dropzone/dropzone.css') }}" rel="stylesheet" />

    <!-- Multi Select Css -->
    <link href="{{ url('admin/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet" />

    <!-- Bootstrap Spinner Css -->
    <link href="{{ url('admin/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ url('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ url('admin/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ url('admin/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('admin/css/themes/all-themes.css') }}" rel="stylesheet"/>
</head>

<body class="theme-black">

    <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-black">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Hang Tight... We are loading...</p>
            </div>
        </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Search Bar
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    #END# Search Bar -->

        @include('admin.layouts.header')

        <section>

            @include('admin.layouts.sidebar')

        </section>

        @yield('content')

        <!-- Jquery Core Js -->
        <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

        <!-- Select Plugin Js -->
        <script src="{{ url('admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

        <!-- Bootstrap Colorpicker Js -->
        <script src="{{ url('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

        <!-- Dropzone Plugin Js -->
        <script src="{{ url('admin/plugins/dropzone/dropzone.js"') }}></script>

        <!-- Input Mask Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

        <!-- Multi Select Plugin Js -->
        <script src="{{ url('admin/plugins/multi-select/js/jquery.multi-select.js"') }}'></script>

        <!-- Jquery Spinner Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>

        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="{{ url('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"') }}'></script>

        <!-- noUISlider Plugin Js -->
        <script src="{{ url('admin/plugins/nouislider/nouislider.js') }}"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-countto/jquery.countTo.js') }}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{ url('admin/plugins/node-waves/waves.js') }}"></script>

        <!-- Morris Plugin Js -->
        <script src="{{ url('admin/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ url('admin/plugins/morrisjs/morris.js') }}"></script>

        <!-- ChartJs -->
        <script src="{{ url('admin/plugins/chartjs/Chart.bundle.js') }}"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
        <script src="{{ url('admin/plugins/flot-charts/jquery.flot.time.js') }}"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

        <!-- SweetAlert Plugin Js -->
        <script src="{{ url('admin/plugins/sweetalert/sweetalert.min.js') }}"></script>

        <!-- Custom Js -->
        <script src="{{ url('admin/js/admin.js') }}"></script>
        <script src="{{ url('admin/js/pages/index.js') }}"></script>
        <script src="{{ url('admin/js/pages/ui/dialogs.js') }}"></script>
        <script src="{{ url('admin/js/pages/forms/advanced-form-elements.js') }}"></script>

        <!-- Demo Js -->
        <script src="{{ url('admin/js/demo.js') }}"></script>

        <script type="text/javascript">

            // Set User Type Variable

            const userType = "{{ Auth::guard('admin')->user()->type }}"

            // Display time on top right

            function showTime() {
                var date = new Date(),
                    utc = new Date(Date.now());
                const options = {
                    weekday: 'short',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    timeZone: 'Pacific/Auckland',
                };

                document.getElementById('time').innerHTML = utc.toLocaleString('en-NZ', options).replace("am", "AM").replace("pm","PM");
            }

            setInterval(showTime, 1000);

        </script>

        <script src="{{ url('admin/js/custom.js') }}"></script>

    </body>

</html>
