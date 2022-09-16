<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
        <!-- Favicon-->
        <link rel="icon" href="{{ url('admin/images/favicon.ico') }}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{ url('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />

        <!-- Waves Effect Css -->
        <link href="{{ url('admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{ url('admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="{{ url('admin/css/style.css') }}" rel="stylesheet" />
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Amz<b>Clone</b></a>
                <small>Admin Console - One stop for everything</small>
            </div>
            <div class="card">
                <div class="body">
                    @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </div>
                    @endif
                    <form id="sign_in" name="sign_in" method="POST" action="{{ url('/admin/login') }}">
                        @csrf
                        <div class="msg">Sign in to start your session</div>
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit" id="submit">SIGN IN</button>
                            </div>
                            <div class="col-xs-3">
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <a href="{{ url('/admin/signup') }}">Register Now!</a>
                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="{{ url('/admin/forgotPass') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{ url('admin/plugins/jquery/jquery.min.js')  }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.js')  }}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{ url('admin/plugins/node-waves/waves.js')  }}"></script>

        <!-- Validation Plugin Js -->
        <script src="{{ url('admin/plugins/jquery-validation/jquery.validate.js')  }}"></script>

        <!-- Custom Js -->
        <script src="{{ url('admin/js/admin.js')  }}"></script>
        <script src="{{ url('admin/js/pages/examples/sign-in.js')  }}"></script>
    </body>

</html>
