@extends('layouts.blank', ['title' => 'Not Found Resource'])

@section('content')
<div class="error-page">
    <div class="error-box">
        <img src="{{ asset('assets/img/500.png')}}" width="200" class="img-fluid" alt="Unexpected error">
        <h1>500 Unexpected Error</h1>
        <p class="error-content">We’re having some issuesat the moment. we’ll have it fixed in no time.</p>
        <div class="back-button">
            <a href="{{ route('home') }}" class="btn">Back to Home</a>
        </div>
    </div>
</div>
@endsection