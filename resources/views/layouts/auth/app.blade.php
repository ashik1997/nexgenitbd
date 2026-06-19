<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a premium responsive admin dashboard template with great features.">
    <meta name="keywords" content="responsive, admin template, dashboard template, bootstrap 4, laravel, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @stack('title') | {{ config('app.name') }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/panel/vertical/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/panel/vertical/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
    <!--====== AJAX ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            @yield('content')
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start JS -->
    <script src="{{ asset('assets/panel/vertical/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/detect.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/jquery.slimscroll.js') }}"></script>
    <!-- End js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @include('sweetalert::alert')
</body>
</html>
