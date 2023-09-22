<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="https://www.nougattechnologies.co.tz/" />
    <meta name="keywords" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:title" content="Dream Chalets Engineering" />
    <meta property="og:description" content="Dream Chalets Engineering" />
    <meta property="og:site_name" content="Dream Chalets Engineering" />
    <meta property="og:image" content="{{ asset('assets/img/dce_logo.png')}}" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="{{env('APP_URL')}}" />
    <meta property="twitter:title" content="Dream Chalets Engineering" />
    <meta property="twitter:description" content="Dream Chalets Engineering" />
    <meta property="twitter:image" content="{{ asset('assets/img/dce_logo.png')}}" />
    <meta property="twitter:image:alt" content="Company logo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dream Chalets Engineering') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico')}}" />

    <title>{{ config('app.name', 'DCE') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.min.css')}}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/bundles/bootstrap-social/bootstrap-social.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/custom.css')}}">
</head>
<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('dashboard/assets/js/app.min.js')}}"></script>
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
    @yield('scripts')
    <!-- Template JS File -->
    <script src="{{ asset('dashboard/assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('dashboard/assets/js/custom.js')}}"></script>
</body>
</html>
