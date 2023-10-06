@extends('layouts.app', ['title' => 'Dream Chalets Engineering'])

@section('content')
<section class="swiper-slider banner-section">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/02.jpg') }}">
                    <div class="container">
                        <div class="banner-content">
                            <h4 class="text-uppercase mb-1" data-swiper-parallax="300">We are here to</h4>
                            <h1 class="font-weight-bold mb-3" data-swiper-parallax="350">Planning Business</h1>
                            <p class="text-dark mb-50" data-swiper-parallax="400">Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                <br> incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="about.html" class="btn btn-primary text-uppercase" data-swiper-parallax="450">more details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/03.jpg') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase mb-1" data-swiper-parallax="300">We are here to</h4>
                            <h1 class="font-weight-bold mb-3" data-swiper-parallax="350">Planning Business</h1>
                            <p class="text-dark mb-50" data-swiper-parallax="400">Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                <br> incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="about.html" class="btn btn-primary text-uppercase" data-swiper-parallax="450">more details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner.jpg') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase mb-1" data-swiper-parallax="300">Start your</h4>
                            <h1 class="font-weight-bold mb-3" data-swiper-parallax="350">Future Plan</h1>
                            <p class="text-dark mb-50" data-swiper-parallax="400">Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                <br> incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="about.html" class="btn btn-primary text-uppercase" data-swiper-parallax="450">more details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end swiper-slide -->
            <!-- start swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image" data-background="{{ asset('assets/img/banner.jpg') }}">
                    <div class="container">
                        <div class="banner-content" data-aos="fade-down">
                            <h4 class="text-uppercase mb-1" data-swiper-parallax="300">We are always</h4>
                            <h1 class="font-weight-bold mb-3" data-swiper-parallax="350">Be Inspired By Best</h1>
                            <p class="text-dark mb-50" data-swiper-parallax="400">Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                <br> incididunt ut labore et dolore magna aliqua.
                            </p>
                            <a href="about.html" class="btn btn-outline text-uppercase" data-swiper-parallax="450">more details</a>
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
            <p>Follow these 4 steps to get your dream house plan</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                    <div class="work-card-icon">
                        <span>
                            <img src="assets/img/icons/work-icon-1.svg" alt="icon">
                        </span>
                    </div>
                    <h4>01. Search for Location</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio…</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                    <div class="work-card-icon">
                        <span class="bg-red">
                            <img src="assets/img/icons/work-icon-2.svg" alt="icon">
                        </span>
                    </div>
                    <h4>02. Select Property Type</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio…</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                    <div class="work-card-icon">
                        <span class="bg-green">
                            <img src="assets/img/icons/work-icon-3.svg" alt="icon">
                        </span>
                    </div>
                    <h4>03. Book Your Property</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio…</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="300">
                    <div class="work-card-icon">
                        <span class="bg-secondary">
                            <img src="assets/img/icons/work-icon-3.svg" alt="icon">
                        </span>
                    </div>
                    <h4>04. Book Your Property</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio…</p>
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
                                    <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}" class="property-img">
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
                                        <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}">{!! $property->title !!}</a>
                                    </h3>
                                    <ul class="d-flex details">
                                        <li>
                                            <i class="fas fa-bed fa-1x text-secondary mx-1"></i>
                                            {{ $property->bedrooms ?? 0 }} Beds
                                        </li>
                                        <li>
                                            <i class="fas fa-trowel-bricks fa-1x text-secondary mx-1"></i>
                                            {{ $property->bathrooms ?? 0 }} Blocks
                                        </li>
                                        <li>
                                            <i class="fas fa-sheet-plastic fa-1x text-secondary mx-1"></i>
                                            {{ $property->floors }} Roof
                                        </li>
                                        <li>
                                            <i class="fas fa-ruler-horizontal fa-1x text-secondary mx-1"></i>
                                            {{ $property->square_meter }} Sqm
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
            <div class="col-md-4">
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
            <div class="col-md-8">
                <div class="property-type-slider owl-carousel">
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="assets/img/icons/property-icon-1.svg" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4>Houses</h4>
                            <p>30 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="assets/img/icons/property-icon-2.svg" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4>Offices</h4>
                            <p>25 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="assets/img/icons/property-icon-4.svg" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4>Apartment</h4>
                            <p>35 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="assets/img/icons/property-icon-1.svg" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4>Houses</h4>
                            <p>30 Properties</p>
                        </div>
                    </div>
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            <img src="assets/img/icons/property-icon-4.svg" alt="icon">
                        </div>
                        <div class="property-name">
                            <h4>Apartment</h4>
                            <p>35 Properties</p>
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
            <div class="col-md-12">
                <div class="feature-slider-deals owl-carousel">
                    <div class="slider-col">
                        <div class="product-custom">
                            <div class="profile-widget rent-list-view">
                                <div class="doc-img">
                                    <a href="buy-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/rent/rent-list-01.jpg" />
                                    </a>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite selected">
                                            <span><i class="fa-regular fa-heart"></i></span>
                                        </div>
                                    </a>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User" />
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="list-head">
                                        <div class="rating">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            5.0 (20 Reviews)
                                            <div class="product-name-price">
                                                <h3 class="title">
                                                    <a href="buy-details.html" tabindex="-1">Place perfect for nature</a>
                                                </h3>
                                                <div class="product-amount">
                                                    <h5><span>$41,400 </span></h5>
                                                </div>
                                            </div>
                                            <p>
                                                <i class="feather-map-pin"></i> 318-330 S Oakley Blvd,
                                                Chicago, IL 60612, USA
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon" />
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon" />
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon" />
                                            10000 Sqft
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom">
                            <div class="profile-widget rent-list-view">
                                <div class="doc-img">
                                    <a href="buy-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/rent/rent-list-01.jpg" />
                                    </a>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite selected">
                                            <span><i class="fa-regular fa-heart"></i></span>
                                        </div>
                                    </a>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User" />
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="list-head">
                                        <div class="rating">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            5.0 (20 Reviews)
                                            <div class="product-name-price">
                                                <h3 class="title">
                                                    <a href="buy-details.html" tabindex="-1">Place perfect for nature</a>
                                                </h3>
                                                <div class="product-amount">
                                                    <h5><span>$41,400 </span></h5>
                                                </div>
                                            </div>
                                            <p>
                                                <i class="feather-map-pin"></i> 318-330 S Oakley Blvd,
                                                Chicago, IL 60612, USA
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon" />
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon" />
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon" />
                                            10000 Sqft
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-property-btn d-flex justify-content-center" data-aos="fade-down" data-aos-duration="2000">
                    <a href="rent-property-grid.html" class="btn-primary">View All Properties</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="assets/img/bg/price-bg.png" class="bg-04" alt="Image">
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
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="register-btn" data-aos="fade-down" data-aos-duration="2000">
                    <a href="register.html" class="btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="assets/img/icons/blue-circle.svg" class="bg-06" alt="icon">
        <img src="assets/img/icons/red-circle.svg" class="bg-07" alt="icon">
    </div>
</section>

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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmodtempor incididunt</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="blog-slider owl-carousel">

                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Property</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="blog-details.html">How to achieve financial independence</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-01.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <h6><a href="javascript:void(0);">Doe John</a></h6>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details.html"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Advantages</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="blog-details.html">The most popular cities for homebuyers</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-03.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <h6><a href="javascript:void(0);">John</a></h6>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details.html"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-3.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Finanace</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="blog-details.html">Learn how real estate really shapes our future</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-05.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <h6><a href="javascript:void(0);">Eric Krok</a></h6>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details.html"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Property</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="blog-details.html">The most popular cities for homebuyers</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-07.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <h6><a href="javascript:void(0);">Francis</a></h6>
                                        <p>Posted on : 12 May 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details.html"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="blog-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="blog-img">
                            <a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Property</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="blog-details.html">How to achieve financial independence</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-03.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <h6><a href="javascript:void(0);">Rafael</a></h6>
                                        <p>Posted on : 13 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-details.html"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection