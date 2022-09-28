<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>AmzClone | {{ \Request::route()->getName() }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon-->
        <link rel="icon" href="{{ url('admin/images/favicon.ico') }}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{ url('admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet"/>

        <!-- Waves Effect Css -->
        <link href="{{ url('admin/plugins/node-waves/waves.css') }}" rel="stylesheet"/>

        <!-- Custom Css -->
        <link href="{{ url('admin/css/style.css') }}" rel="stylesheet"/>
    </head>

    <body class="four-zero-four">
        <div class="four-zero-four-container">
            @if(\Illuminate\Support\Facades\Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('success_message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success: </strong> {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error: </strong>
                    <br>
                    @foreach($errors->all() as $error)
                        &emsp; &#x2022; {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            @if($slug > 99 && $slug < 200)
                <div class="error-code" style="color: blue">{{ $slug }}</div>
                <div class="error-message">Protocol failed. This page doesn't exist.</div>
            @elseif($slug > 199 && $slug < 300)
                <div class="error-code" style="color: green">{{ $slug }}</div>
                <div class="error-message">The request is success. But, this page doesn't exist.</div>
            @elseif($slug > 299 && $slug < 400)
                <div class="error-code" style="color: orangered">{{ $slug }}</div>
                <div class="error-message">Redirect failed. This page doesn't exist.</div>
            @elseif($slug > 399 && $slug < 500)
                <div class="error-code" style="color: red">{{ $slug }}</div>
                <div class="error-message">Resource missing / Client issues. This page doesn't exist.</div>
            @elseif($slug > 499 && $slug < 600)
                <div class="error-code" style="color: red">{{ $slug }}</div>
                <div class="error-message">Our servers are busy taking a break. Please try after sometime.</div>
            @else
                <div class="error-code" style="color: red; size: 10px;" >Totally, unknown error to Man Kind. Please move to a new country.</div>
            @endif
            <div class="button-place">
                <a href="{{ url('admin/dashboard') }}" class="btn btn-default btn-lg waves-effect">GO TO HOMEPAGE</a>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{ url('admin/plugins/node-waves/waves.js') }}"></script>
    </body>

</html>
