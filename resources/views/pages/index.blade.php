@extends('layouts.app')

@section('content')
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="banner-content" data-aos="fade-down">
                    <h1>Find Your Best Dream House Plan <span>...</span></h1>
                    <p>We have more than 3000+ house plans for you to choose</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="howit-work">
    <div class="container">
        <div class="section-heading text-center">
            <h2>How It Works</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>Follow these 3 steps to book your place</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
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
            <div class="col-lg-4 col-md-6">
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
            <div class="col-lg-4 col-md-6">
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
            <p>Hand-Picked selection of quality places</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feature-slider owl-carousel">
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-1.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$41,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <div class="new-featured">
                                                <span>New</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite selected">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-01.jpg" alt="User">
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
                                        <a href="rent-details.html">Place perfect for nature</a>
                                    </h3>
                                    <p><span><i class="feather-map-pin"></i></span>318-S Oakley Blvd, Chicago, IL 60612, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            4 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            35000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">16 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Apartment</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-2.jpg">
                                    </a>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="product-amount">
                                        <span>$78,000</span>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User">
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <p class="rating-review"><span>3.0</span>(10 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Beautiful Condo Room</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            2 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            15000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">17 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Condos</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-3.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$63,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-03.jpg" alt="User">
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <p class="rating-review"><span>4.0</span>(28 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Summer house</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>82-25 Parsons Blvd, Jamaica, NY 11432, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            1 Bath
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            5000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">13 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">House</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-detail-viewhtml" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-4.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$51,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-04.jpg" alt="User">
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
                                        <p class="rating-review"><span>5.0</span>(15 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Minimalist and bright flat</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>518-520 8th Ave, New York, NY 10018, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            1 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            25000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">18 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Flats</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-5.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$29,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-05.jpg" alt="User">
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
                                        <a href="rent-details.html">Two storey modern flat</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            2 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            31000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">19 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Flat</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-2.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$80,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-06.jpg" alt="User">
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <p class="rating-review"><span>4.0</span>(12 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Modern apartment</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>122 N Morgan St, Chicago, IL 60607, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            12000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">20 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Apartment</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-4.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$51,000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-07.jpg" alt="User">
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
                                        <span class="rating-review">5.0 (60 Reviews)</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Minimalist and bright flat</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>518-520 8th Ave, New York, NY 10018, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            2 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            23000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">21 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Flats</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="1000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-3.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <span>$41000</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <div class="favourite">
                                                <span><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-avatar">
                                        <img src="assets/img/profiles/avatar-05.jpg" alt="User">
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
                                        <span class="rating-review">5.0 (50 Reviews)</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Place perfect for nature</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>318-S Oakley Blvd, Chicago, IL 60612, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            4 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            15000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between">
                                        <li>
                                            <span class="list">Listed on : </span>
                                            <span class="date">16 Jan 2023</span>
                                        </li>
                                        <li>
                                            <span class="category list">Category : </span>
                                            <span class="category-value date">Apartment</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-property-btn d-flex justify-content-center" data-aos="fade-down" data-aos-duration="1000">
                    <a href="rent-property-grid.html" class="btn-primary">View All Properties</a>
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
                    <h2>Explore by House Type</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed </p>
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
        <div class="section-heading text-center">
            <h2>Most Picked House Plans</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>Hand-picked selection of quality places</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="feature-slider owl-carousel">
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-6.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$2,200 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                    <div class="new-featured">
                                        <span>New</span>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite selected">
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Beautiful Condo Room</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 318-S Oakley Blvd, Chicago, IL 60612, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            4 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            35000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-01.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Marc Silva</a></h6>
                                                <p>Newyork</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-7.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$1,400 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Grand Mahaka</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            4 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            35000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-02.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Karen Maria</a></h6>
                                                <p>South Dokata</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-8.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$1,500 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
                                    </div>
                                    <a href="javascript:void(0)">
                                        <div class="favourite selected">
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Royal Apartment</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 82-25 Parsons Blvd, Jamaica, NY 11432, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            12000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-03.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Scott Gwin</a></h6>
                                                <p>Minipoliies</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-9.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$3,500 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Lunaria Residence</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            2 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            23000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-04.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Burdette</a></h6>
                                                <p>Cambridge</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-10.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$4,500 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Grand Villa house</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            5000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-05.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Kell Robinson</a></h6>
                                                <p>USA</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-11.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$2,400 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Stephen Alexander Homes</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 122 N Morgan St, Chicago, IL 60607, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            25000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-07.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Pittman</a></h6>
                                                <p>Cambridge</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-7.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$1,400 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Minimalist and bright flat</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            2 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            18000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-10.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">John Doe</a></h6>
                                                <p>Newyork</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="rent-details.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="assets/img/product/product-9.jpg">
                                    </a>
                                    <div class="product-amount">
                                        <h5><span>$3,500 </span> / Night</h5>
                                    </div>
                                    <div class="featured">
                                        <span>Featured</span>
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
                                        <span class="rating-review">Excellent</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="rent-details.html">Place perfect for nature</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 318-S Oakley Blvd, Chicago, IL 60612, USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            1 Bath
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            12000 Sqft
                                        </li>
                                    </ul>
                                    <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="rent-details.html"><img src="assets/img/profiles/avatar-12.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6><a href="rent-details.html">Richard</a></h6>
                                                <p>Newyork</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="rent-details.html" class="btn-primary">Book Now</a>
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

<section class="counter-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="counter-box flex-fill" data-aos="fade-down" data-aos-duration="2000">
                    <div class="counter-icon">
                        <img src="assets/img/icons/counter-icon-1.svg" alt="icon">
                    </div>
                    <div class="counter-value">
                        <h3 class="dash-count"><span class="counter-up">50</span>K</h3>
                        <h5>Floor Plans Added </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="counter-box flex-fill" data-aos="fade-down" data-aos-duration="2000">
                    <div class="counter-icon">
                        <img src="assets/img/icons/counter-icon-2.svg" alt="icon">
                    </div>
                    <div class="counter-value">
                        <h3 class="dash-count"><span class="counter-up">3000</span>+</h3>
                        <h5>Clients </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="counter-box flex-fill" data-aos="fade-down" data-aos-duration="2000">
                    <div class="counter-icon">
                        <img src="assets/img/icons/counter-icon-3.svg" alt="icon">
                    </div>
                    <div class="counter-value">
                        <h3 class="dash-count"><span class="counter-up">2000</span>+</h3>
                        <h5>Sales Completed </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="counter-box flex-fill" data-aos="fade-down" data-aos-duration="2000">
                    <div class="counter-icon">
                        <img src="assets/img/icons/counter-icon-4.svg" alt="icon">
                    </div>
                    <div class="counter-value">
                        <h3 class="dash-count"><span class="counter-up">5000</span>+</h3>
                        <h5>Users</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-property-sec">
    <div class="container">
        <div class="partners-sec">
            <div class="section-heading text-center">
                <h2>Hundreds of Partners Around the World</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p> Every day, we build trust through communication, transparency, and results.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="partners-slider owl-carousel">
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-1.svg" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-2.svg" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-3.svg" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-4.svg" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-5.svg" alt="Partners">
                        </div>
                        <div class="partner-icon">
                            <img src="assets/img/icons/partner-icon-6.svg" alt="Partners">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-imgs">
        <img src="assets/img/icons/blue-circle.svg" class="bg-08" alt="icon">
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

<section class="news-letter-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="news-heading" data-aos="fade-down" data-aos-duration="2000">
                    <h2>Sign Up for Our Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet, consecte tur cing elit. Suspe ndisse suscipit sagittis</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="email-form" data-aos="fade-down" data-aos-duration="2000">
                    <form action="#">
                        <input type="email" class="form-control" placeholder="Enter Email Address">
                        <button class="btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection