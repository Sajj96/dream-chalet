@extends('layouts.app', ['title' => 'Property | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
@endsection

@section('content')
<section class="buy-detailview">
    <div class="container-fluid buy-details-header">
        <div class="row align-items-center page-head">
            <div class="col-lg-8">
                <div class="buy-btn">
                    <span class="appartment">{{ $property->houseTypeName }}</span>
                </div>
                <div class="page-title">
                    <h3>{!! $property->title !!}<span><img src="{{ asset('assets/img/icons/location-icon.svg')}}" alt="Image"></span></h3>
                    <p>Last Updated on : {{ date('d M Y', strtotime($property->created_at)) }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="latest-update">
                    <p>{{ number_format($property->price)." ".$property->currency }}</p>
                    <ul class="other-pages">
                        <li><a href="javascript:void(0);"><i class="feather-share-2"></i>Share</a></li>
                        <li><a href="compare.html"><i class="feather-git-pull-request"></i>Add to Compare</a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="feather-heart"></i>Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="buy-details-col">
                    <div class="rental-card">
                        <div class="slider rental-slider">
                            @foreach($photos as $photo)
                            <div class="product-img">
                                <img src="{{ $photo->photo_path }}" alt="Slider">
                            </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav-thumbnails">
                            @foreach($photos as $photo)
                            <div><img src="{{ $photo->photo_path }}" alt="product image"></div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="collapse-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#overview" aria-expanded="false">Overview</a>
                    </h4>
                    <div id="overview" class="card-collapse collapse show">
                        <ul class="property-overview  collapse-view overview">
                            <li>
                                <i class="fas fa-bed fa-1x text-primary"></i>
                                <p>{{ $property->bedrooms }} Beds</p>
                            </li>
                            <li>
                                <i class="fas fa-bath fa-1x text-primary"></i>
                                <p>{{ $property->bathrooms }} Baths</p>
                            </li>
                            <li>
                                <i class="fas fa-square fa-1x text-primary"></i>
                                <p>{{ $property->square_meter }} Sqft</p>
                            </li>
                            <li>
                                <i class="fas fa-building fa-1x text-primary"></i>
                                <p>{{ $property->floors }} Storeys</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="collapse-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#about" aria-expanded="false">Description</a>
                    </h4>
                    <div id="about" class="card-collapse collapse show">
                        <div class="about-agent collapse-view">
                            <p>{!! $property->details !!}</p>
                        </div>
                    </div>
                </div>

                <div class="collapse-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#video" aria-expanded="false">Floor Plan</a>
                    </h4>
                    <div id="video" class="card-collapse collapse show">
                        <div class="sample-video collapse-view">
                            <img src="{{ $property->floor_image }}" alt="Image">

                            <div class="price-card premium">
                                <div class="price-sticker">
                                    <img src="{{ asset('assets/img/icons/pricing-icon.svg')}}" alt="price-sticker">
                                </div>
                                <div class="price-title">
                                    <h3>Upgrade To Premium</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                                <div class="arrival-div">
                                    <ul class="prices">
                                        <li>
                                            <input type="radio" id="radio1" name="Arrival">
                                            <label for="radio1">Per Week<span>$10</span>Standard</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio2" name="Arrival" checked>
                                            <label for="radio2">Per Month<span>$25</span>Professional</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio3" name="Arrival">
                                            <label for="radio3">Per Year<span>$100</span>Enterprice</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 theiaStickySidebar">
                <div class="right-sidebar">

                    <div class="sidebar-card mt-3">
                        <div class="sidebar-card-title">
                            <h5>Share Property</h5>
                        </div>
                        <div class="social-links">
                            <ul class="sidebar-social-links">
                                <li><a href="javascript:void(0);" class="fb-icon"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-instagram hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);" class="twitter-icon"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-card mt-2">
                        <div class="sidebar-card-title">
                            <p>Choose Service</p>
                        </div>
                        <div class="arrival-div arrival-dept">
                            <ul class="prices-two">
                                <li>
                                    <input type="radio" id="radio4" name="Arrival">
                                    <label for="radio4">Purchase this house plan</label>
                                </li>
                                <li>
                                    <input type="radio" id="radio5" name="Arrival" checked>
                                    <label for="radio5">Customize this house plan</label>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-card-title">
                            <p>Your Information</p>
                        </div>
                        <div class="review-form">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="review-form">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="review-form">
                            <input type="text" class="form-control" placeholder="Your Phone Number">
                        </div>
                        <div class="review-form">
                            <textarea rows="5" placeholder="Yes, I'm Interested"></textarea>
                        </div>
                        <div class="review-form submit-btn">
                            <button type="submit" class="btn-primary">Proceed to Payment</button>
                        </div>
                        <ul class="connect-us">
                            <li><a href="javascript:void(0);"><i class="feather-phone"></i>Clear</a></li>
                            <li><a href="javascript:void(0);"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-lg-8">
                <div class="sidebar-card">
                    <div class="sidebar-card-title">
                        <h5>Cost Estimate Per Stage</h5>
                    </div>
                    <ul class="list-details">
                        @foreach($stages as $stage)
                        <li>{{ $stage->name }} <span>{{ $stage->pivot->price }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="collapse-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#amenities" aria-expanded="false">Amenities</a>
                    </h4>
                    <div id="amenities" class="card-collapse collapse show  collapse-view">
                        <div class="row">
                            @foreach($amenities as $amenity)
                            <div class="col-md-4">
                                <div class="upload-list">
                                    <ul>
                                        <li>{{ $amenity->name }}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="collapse-card sidebar-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">Reviews (25)</a>
                    </h4>
                    <div id="review" class="card-collapse collapse show  collapse-view">
                        <div class="review-card">
                            <div class="customer-review">
                                <div class="customer-info">
                                    <div class="customer-name">
                                        <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-01.jpg" alt="User"></a>
                                        <div>
                                            <h5><a href="javascript:void(0);">Johnson</a></h5>
                                            <p>02 Jan 2023</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <span class="rating-count">
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star checked"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <p class="rating-review"><span>4.0</span>(20 Reviews)</p>
                                    </div>
                                </div>
                                <div class="review-para">
                                    <p>It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop
                                        publishing software like Aldus PageMaker including versions of Lorem
                                        Ipsum.It was popularised in the 1960s </p>
                                </div>
                            </div>
                            <div class="customer-review">
                                <div class="customer-info">
                                    <div class="customer-name">
                                        <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-02.jpg" alt="User"></a>
                                        <div>
                                            <h5><a href="javascript:void(0);">Casandra</a></h5>
                                            <p>01 Jan 2023</p>
                                        </div>
                                    </div>
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
                                </div>
                                <div class="review-para">
                                    <p>It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop
                                        publishing software like Aldus PageMaker including versions of Lorem
                                        Ipsum.It was popularised in the 1960s with the elease of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently with desktop
                                        publishing software like Aldus Page Maker including versions.</p>
                                </div>
                            </div>
                            <div class="property-review">
                                <h5 class="card-title">Property Reviews</h5>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="review-form">
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="review-form">
                                                <input type="email" class="form-control" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="review-form">
                                                <textarea rows="5" placeholder="Enter Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="review-form submit-btn">
                                                <button type="submit" class="btn-primary">Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="right-sidebar">
                    <div class="sidebar-img-slider owl-carousel">
                        <div class="slide-img-card">
                            <div class="slide-img">
                                <img src="{{ asset('assets/img/sidebar-slide.jpg')}}" alt="Image">
                            </div>
                            <div class="property-name">
                                <h3>High-Rise Townhouse</h3>
                                <span><i class="feather-map-pin"></i>Chicago</span>
                                <div class="star-rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="slide-img-card">
                            <div class="slide-img">
                                <img src="{{ asset('assets/img/sidebar-slide.jpg')}}" alt="Image">
                            </div>
                            <div class="property-name">
                                <h3>High-Rise Townhouse</h3>
                                <span><i class="feather-map-pin"></i>Chicago</span>
                                <div class="star-rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="slide-img-card">
                            <div class="slide-img">
                                <img src="{{ asset('assets/img/sidebar-slide.jpg')}}" alt="Image">
                            </div>
                            <div class="property-name">
                                <h3>High-Rise Townhouse</h3>
                                <span><i class="feather-map-pin"></i>Chicago</span>
                                <div class="star-rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="similar-list">
            <div class="section-heading">
                <h2>Similar Listings</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmodtempor incididunt</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-slider owl-carousel">

                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="buy-detail-view.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ asset('assets/img/product/product-1.jpg')}}">
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
                                            <div class="favourite">
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
                                        <a href="buy-detail-view.html">Place perfect for nature</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 318-S Oakley Blvd, Chicago, IL 60612, USA
                                    </p>
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


                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="buy-detail-view.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ asset('assets/img/product/product-2.jpg')}}">
                                    </a>
                                    <div class="product-amount">
                                        <span>$78,000</span>
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
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="User">
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
                                        <p class="rating-review"><span>5.0</span>(25 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="buy-detail-view.html">Beautiful Condo Room</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 470 Park Ave S, New York, NY 10016</p>
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
                                            3000 Sqft
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


                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="buy-detail-view.html" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ asset('assets/img/product/product-3.jpg')}}">
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
                                            <i class="fa-solid fa-star checked"></i>
                                        </span>
                                        <p class="rating-review"><span>5.0</span>(10 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="buy-detail-view.html">Summer house</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 82-25 Parsons Blvd, Jamaica, NY 11432,
                                        USA</p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            3 Beds
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


                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="buy-detail-view.html" class="property-img">
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
                                        <p class="rating-review"><span>5.0</span>(5 Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="buy-detail-view.html">Minimalist and bright flat</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i> 518-520 8th Ave, New York, NY 10018, USA
                                    </p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            4 Beds
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


                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="buy-detail-view.html" class="property-img">
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
                                        <a href="buy-detail-view.html">Two storey modern flat</a>
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

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
@endsection