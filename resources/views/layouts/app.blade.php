<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="https://www.nougattechnologies.co.tz/" />
    <meta name="keywords" content="Dream Chalets Engineering,Real estate,Dalali wa viwanja,Natafuta nyumba,Natafuta nyumba ya kupanga,Real estate companies in tanzania,Real estate agents in tanzania,Natafuta kiwanja,Property listing website,Property listing agencies">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:title" content="Dream Chalets Engineering" />
    <meta property="og:description" content="Dream Chalets Engineering" />
    <meta property="og:site_name" content="Dream Chalets Engineering" />
    <meta property="og:image" content="{{ asset('assets/img/dce_logo.png')}}" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="{{env('APP_URL')}}" />
    <meta property="twitter:title" content="Dream Chalets Engineering" />
    <meta property="twitter:description" content="Dream Chalets Engineering" />
    <meta property="twitter:image" content="{{ asset('assets/img/dce_logo.png')}}" />
    <meta property="twitter:image:alt" content="Company logo" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if ($title)
    <title>{{ $title }} - DCE</title>
    @else
    <title>DCE Portal</title>
    @endif

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/img/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/boxicons/css/boxicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    @yield('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="main-wrapper">
        @include('partials.navigation')
        @yield('content')
        @include('partials.footer')
        @include('partials.search_popup')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    @yield('scripts')

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>