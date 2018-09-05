<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ url('images/agenda.png') }}" type="image/png" sizes="16x16">

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Ubuntu');

        html,body {
            height: 100%;
            background: url('images/bgaerial.jpg') fixed;
            background-size: cover;
            font-family: 'Ubuntu', sans-serif;
        }
        #app {
            display: table !important;
            width: 100%;
            height: 100%;
            min-height: 100%;
        }
        .row-wrapper {
            display: table-cell !important;
            vertical-align: top;
        }
        .login-panel {
            width: 500px;
            margin-right: auto;
            margin-left: auto;
        }
        .panel {
            border-radius: 0px;
            padding: 30px;
        }
        .fa-calendar:before {
            color: #2579a9;
        }
        @media (max-width: 767px){
            .row-wrapper {
                vertical-align: middle !important;
            }
            .login-panel {
                width: 100%;
            }
        }
        @media (min-width: 768px){
            .row-wrapper {
                vertical-align: middle !important;
            }
            .login-panel {
                width: 500px;
            }
        }
        @media (min-width: 992px){
            .login-panel {
                width: 500px;
            }
        }
    </style>

</head>
<body>
    <div id="app">
        @yield('content')
    </div>

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/914230375d.js"></script>
</body>
</html>