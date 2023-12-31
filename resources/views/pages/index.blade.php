@extends('layouts.app', ['title' => 'Dream Chalets Engineering'])

@section('content')
@include('partials.session-message')
<section class="swiper-slider banner-section">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner1.png') }}">
                    <div class="container">
                        <div class="banner-content">
                            <h4 class="text-uppercase text-white mb-1" data-swiper-parallax="300">We are here to</h4>
                            <h1 class="font-weight-bold text-white mb-3" data-swiper-parallax="350">{{ __('To give you the Best Designs')}}</h1>
                            <p class="text-white mb-50" data-swiper-parallax="400">
                                We have stipulated contents of our designs in each property and good enough you can view any plan before purchasing it.
                            </p>
                            <a href="{{ route('property') }}" class="btn btn-primary text-uppercase" data-swiper-parallax="450">explore properties</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner5.png') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase text-white mb-1" data-swiper-parallax="300">We offer Quick service</h4>
                            <h1 class="font-weight-bold text-white mb-3" data-swiper-parallax="350">{{ __('Flexible to clients\' requirements')}}</h1>
                            <p class="text-white mb-50" data-swiper-parallax="400">We are consistently meet customers’ expectations as our service is quick, easy, personalized, and empathetic. 
                            </p>
                            <a href="{{ route('about') }}" class="btn btn-primary text-uppercase" data-swiper-parallax="450">more about us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner3.png') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase text-white mb-1" data-swiper-parallax="300">Start your</h4>
                            <h1 class="font-weight-bold text-white mb-3" data-swiper-parallax="350">{{ __('Future Plan')}}</h1>
                            <p class="text-white mb-50" data-swiper-parallax="400">Explore to our website to get your house plan instantly. 
                            </p>
                            <a href="{{ route('property') }}" class="btn btn-primary text-uppercase" data-swiper-parallax="450">explore properties</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner4.png') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase text-white mb-1" data-swiper-parallax="300">We are always</h4>
                            <h1 class="font-weight-bold text-white mb-3" data-swiper-parallax="350">{{ __('Be Inspired By Best')}}</h1>
                            <p class="text-white mb-50" data-swiper-parallax="400">As we developing and converting client ideas into reality, we take client idea we improve it and make it happen into reality.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
        </div>
        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<section class="howit-work">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Why Choose Us</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>We strive to complete projects timely and within budget.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                    <div class="work-card-icon">
                        <span>
                            <img src="{{ asset('assets/img/icons/work-icon-1.svg')}}" alt="icon">
                        </span>
                    </div>
                    <h4>{{ __('01. Meets Client\'s Expectations')}}</h4>
                    <p>Create detail schedule and resources plan to meet client's project objective</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                    <div class="work-card-icon">
                        <span class="bg-red">
                            <img src="{{ asset('assets/img/icons/work-icon-2.svg')}}" alt="icon">
                        </span>
                    </div>
                    <h4>{{ __('02. Effective Communication')}}</h4>
                    <p>Communicate clearly with all project stakeholders</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                    <div class="work-card-icon">
                        <span class="bg-green">
                            <img src="{{ asset('assets/img/icons/work-icon-3.svg')}}" alt="icon">
                        </span>
                    </div>
                    <h4>{{ __('03. Project Management')}}</h4>
                    <p>Track project progress and fine-tune deviations</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                    <div class="work-card-icon">
                        <span class="bg-secondary">
                            <img src="{{ asset('assets/img/icons/work-icon-3.svg')}}" alt="icon">
                        </span>
                    </div>
                    <h4>{{ __('04. Quality and Affordable')}}</h4>
                    <p>Dealing with cost control [Cost minimising] while uplifting job quality</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-property-sec">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Featured House Plans</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>Find your dream house plan from our Newly added properties</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($properties as $property)
                    <div class="col-lg-4">
                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseTypeName.' '.$property->id))]) }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ $property->thumbnail }}">
                                    </a>
                                    <div class="product-amount">
                                        <span>${{ number_format($property->price) }}</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>{{ $property->houseTypeName }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite">
                                            <span><i class="fa-regular fa-heart"></i></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <h6 class="rating-review text-secondary"><span>{{ number_format($property->review->rate, 1) }}</span>({{ $property->review->review_count }} Reviews)</h6>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseTypeName.' '.$property->id))])}}">{!! $property->bedrooms .' Bedrooms - '. $property->title !!}</a>
                                    </h3>
                                    <ul class="d-flex details">
                                        <li>
                                            <i class="fas fa-bed fa-1x text-secondary mx-1"></i>
                                            {{ $property->bedrooms ?? 0 }} Beds
                                        </li>
                                        <li>
                                            <i class="fas fa-trowel-bricks fa-1x text-secondary mx-1"></i>
                                            {{ $property->blocks ?? 0 }} Blocks
                                        </li>
                                        <li>
                                            <i class="fas fa-sheet-plastic fa-1x text-secondary mx-1"></i>
                                            {{ $property->roofs }} Roofing Sheets
                                        </li>
                                        <li>
                                            <i class="fas fa-ruler-horizontal fa-1x text-secondary mx-1"></i>
                                            {{ $property->square_meter }} m<sup>2</sup> <span class="mx-1">Plot size</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="view-property-btn d-flex justify-content-center" data-aos="fade-down" data-aos-duration="1000">
                    <a href="{{ route('property') }}" class="btn-primary">View All Properties</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="assets/img/bg/price-bg.png" class="bg-01" alt="icon">
        <img src="assets/img/icons/blue-circle.svg" class="bg-02" alt="icon">
        <img src="assets/img/icons/red-circle.svg" class="bg-03" alt="icon">
    </div>
</section>

<section class="property-type-sec">
    <div class="section-shape-imgs">
        <img src="assets/img/shapes/property-sec-bg-1.png" class="rectangle-left" alt="icon">
        <img src="assets/img/shapes/property-sec-bg-2.png" class="rectangle-right" alt="icon">
        <img src="assets/img/icons/red-circle.svg" class="bg-09" alt="Image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="section-heading" data-aos="fade-down" data-aos-duration="1000">
                    <h2>What are you looking for?</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>We provide full service at every step. </p>
                </div>
                <div class="owl-navigation">
                    <div class="owl-nav mynav1 nav-control"></div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="property-type-slider owl-carousel">
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="{{ asset('assets/img/icons/property-icon-1.svg')}}" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4><a href="{{ route('property', 'bedroom=1') }}">1 Bedroom</a></h4>
                            <p>30 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="{{ asset('assets/img/icons/property-icon-1.svg')}}" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4><a href="{{ route('property', 'bedroom=2') }}">2 Bedrooms</a></h4>
                            <p>25 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="{{ asset('assets/img/icons/property-icon-4.svg')}}" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4><a href="{{ route('property', 'bedroom=3') }}">3 Bedrooms</a></h4>
                            <p>35 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="{{ asset('assets/img/icons/property-icon-4.svg')}}" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4><a href="{{ route('property', 'bedroom=4') }}">4 Bedrooms</a></h4>
                            <p>30 Properties</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-property-sec for-rent">
    <div class="container">
        <div class="section-heading text-left">
            <h2>We Are Offering The Best Deals</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>Check out the listings of our best deals</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="feature-slider-deals owl-carousel">
                    @foreach($trending_properties as $property)
                    <div class="slider-col">
                        <div class="product-custom">
                            <div class="profile-widget rent-list-view">
                                <div class="doc-img">
                                    <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseTypeName.' '.$property->id))]) }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ $property->thumbnail }}" />
                                    </a>
                                    <div class="featured">
                                        <span>{{ $property->houseTypeName }}</span>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite">
                                            <span><i class="fa-regular fa-heart"></i></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="pro-content">
                                    <div class="list-head">
                                        <div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                            </span>
                                            <h6 class="rating-review text-secondary"><span>{{ number_format($property->review->rate, 1) }}</span>({{ $property->review->review_count }} Reviews)</h6>
                                            <div class="product-name-price">
                                                <h3 class="title">
                                                    <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseTypeName.' '.$property->id))]) }}" tabindex="-1">{!! $property->bedrooms .' Bedrooms - '. $property->title !!}</a>
                                                </h3>
                                                <div class="product-amount">
                                                    <h5><span>${{ number_format($property->price) }} </span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="d-flex details">
                                        <li>
                                            <i class="fas fa-bed fa-1x text-secondary mx-1"></i>
                                            {{ $property->bedrooms ?? 0 }} Beds
                                        </li>
                                        <li>
                                            <i class="fas fa-trowel-bricks fa-1x text-secondary mx-1"></i>
                                            {{ $property->blocks ?? 0 }} Blocks
                                        </li>
                                        <li>
                                            <i class="fas fa-sheet-plastic fa-1x text-secondary mx-1"></i>
                                            {{ $property->roofs }} Roofing Sheets
                                        </li>
                                        <li>
                                            <i class="fas fa-ruler-horizontal fa-1x text-secondary mx-1"></i>
                                            {{ $property->square_meter }} m<sup>2</sup> <span class="mx-1">Plot size</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="{{ asset('assets/img/bg/price-bg.png') }}" class="bg-04" alt="Image">
    </div>
</section>

<section class="agent-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
                    <h2>Find Your Dream House Plan</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>We have grown to be a leader in our field because we build and nurture strong client relationships, we rise to any challenge and we value innovation and resourcefulness.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="register-btn" data-aos="fade-down" data-aos-duration="2000">
                    @if(auth()->check() == false)
                    <a href="{{ route('register') }}" class="btn-primary">Join Us Now</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="{{ asset('assets/img/icons/blue-circle.svg') }}" class="bg-06" alt="icon">
        <img src="{{ asset('assets/img/icons/red-circle.svg') }}" class="bg-07" alt="icon">
    </div>
</section>

@if(count($posts) > 0)
<section class="latest-blog-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="section-heading text-center">
                    <h2>Latest Blog</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>Checkout our latest posts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="blog-slider owl-carousel">
                    @foreach($posts as $post)
                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="{{ route('post.show', $post->id) }}"><img src="{{ $post->thumbnail }}" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>{{ $post->categoryName }}</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <p>{{ $post->limit() }}</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <div class="user-name">
                                        <p>Posted on : {{ date('d M Y', strtotime($post->created_at))}}</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('post.show', $post->id) }}"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection