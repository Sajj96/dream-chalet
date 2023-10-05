@extends('layouts.blank', ['title' => 'Not Found Resource'])

@section('content')
<div class="error-page">
    <div class="error-box">
        <img src="{{ asset('assets/img/404.png')}}" width="200" class="img-fluid" alt="Page not found">
        <h1>Oops! Page Not Found!</h1>
        <p>The page you requested was not found.</p>
        <div class="back-button">
            <a href="{{ route('home') }}" class="btn">Back to Home</a>
        </div>
    </div>
</div>
@endsection