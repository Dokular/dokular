<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">

{{--
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="{{ asset('font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all"> --}}

       <!-- Vendor CSS-->
         {{-- <link href="{{ asset('animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('wow/animate.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('slick/slick.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all"> --}}

        <!-- Main CSS-->
        {{-- <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
        {{-- Load the application scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('animsition/animsition.min.js') }}"></script>
        <!-- Main JS-->
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>
