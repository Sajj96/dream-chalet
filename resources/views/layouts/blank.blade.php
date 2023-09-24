<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    @if ($title)
    <title>{{ $title }} - DCE</title>
    @else
    <title>DCE Portal</title>
    @endif

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

    @yield('styles')

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="container">

            <header class="log-header">
                <a href="{{ route('home') }}"><img class="img-fluid logo-dark" src="{{ asset('assets/img/dce_logo_2.png') }}" width="150" height="100" alt="Logo"></a>
            </header>

            @yield('content')
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>