@extends('layouts.app', ['title' => 'About Us | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('content')
<div class="aboutus-page">
    <section class="aboutus-section">
        <div class="container">

            <div class="about-content">
                <h6>About Dream Chalets Engineering</h6>
                <h1>We connect building with people</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate
                    porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
                <p class="mb-0">congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum
                    tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec et
                    libero ligula. Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.</p>
            </div>

        </div>
    </section>
    <div class="section book-section mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-listing">
                        <h2>Ready to Book a Place?</h2>
                        <img src="{{ asset('assets/img/about-us/about-us-04.jpg')}}" alt="aboutus-03">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="book-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus
                            vulputate porttitor sed feugiat nunc. <span>Mauris ac consectetur ante,</span></p>
                        <p>congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum
                            tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Donec
                            et libero ligula. Vivamus semper at orci at placerat.Placeat Lorem ipsum dolor sit amet.
                            congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum
                            tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Done
                            congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis elementum
                            tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra pulvinar. Done
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus
                            vulputate porttitor sed feugiat nunc. <span>Mauris ac consectetur ante,</span></p>
                        <p class="mb-0">congue, sed luctus lectus congue. Integer convallis condimentum sem. Duis
                            elementum tortor eget condimentum tempor. Praesent sollicitudin lectus ut pharetra
                            pulvinar. Donec et libero ligula. Vivamus semper at orci at placerat.Placeat Lorem ipsum
                            dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection