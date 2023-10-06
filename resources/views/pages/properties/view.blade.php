@extends('layouts.app', ['title' => 'Property | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])
@php use Illuminate\Support\Facades\URL; $currentUrl = URL::current(); @endphp

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
                    <h3>{!! $property->bedrooms .' Bedrooms - '. $property->title !!}<span><img src="{{ asset('assets/img/icons/location-icon.svg')}}" alt="Image"></span></h3>
                    <p>Last Updated on : {{ date('d M Y', strtotime($property->created_at)) }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="latest-update">
                    <p>${{ number_format($property->price) }}</p>
                    <ul class="other-pages">
                        <li><a href="compare.html"><i class="feather-git-pull-request"></i>Add to Compare</a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="feather-heart"></i>Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @include('partials.session-message')
        <div class="row">
            <div class="col-lg-8">

                <div class="buy-details-col">
                    <div class="rental-card">
                        <div class="slider rental-slider">
                            @forelse($photos as $photo)
                            <div class="product-img">
                                <img src="{{ $photo->photo_path }}" alt="Slider">
                            </div>
                            @empty
                            <div class="product-img">
                                <img src="{{ $property->thumbnail }}" alt="Slider">
                            </div>
                            @endforelse
                        </div>
                        <div class="slider slider-nav-thumbnails">
                            @forelse($photos as $photo)
                            <div><img src="{{ $photo->photo_path }}" alt="product image"></div>
                            @empty
                            <div class="product-img">
                                <img src="{{ $property->thumbnail }}" alt="Slider">
                            </div>
                            @endforelse
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
                                <img src="{{ asset('assets/img/bed.png')}}" width="40" alt="Image">
                                <p>{{ $property->bedrooms }} Beds</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/img/block.png')}}" width="40" alt="Image">
                                <p>{{ $property->bathrooms }} Blocks</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/img/roof.png')}}" width="40" alt="Image">
                                <p>{{ $property->floors }} Roofing Sheets</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/img/plot.png')}}" width="40" alt="Image">
                                <p>{{ $property->square_meter }} Sq meter</p>
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
                                    <p>Subscribe to see clear floor plan before purchasing this drawings.</p>
                                </div>
                                <div class="arrival-div">
                                    <ul class="prices">
                                        <li>
                                            <input type="radio" id="radio1" name="price">
                                            <label for="radio1">Per Week<span>$10</span>Standard</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio2" name="price" checked>
                                            <label for="radio2">Per Month<span>$25</span>Professional</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="radio3" name="price">
                                            <label for="radio3">Per Year<span>$100</span>Enterprise</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="price-btn">
                                    <a href="javascript:void(0);" class="btn-primary">Pay Now</a>
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
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}" class="fb-icon"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $property->title }}" class="twitter-icon"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
                                <li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a></li>
                                <li><a href="whatsapp://send?text={{ $currentUrl }}"><i class="fa-brands fa-whatsapp hi-icon"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-card mt-2">
                        <div class="sidebar-card-title">
                            <p>Choose Service</p>
                        </div>
                        <form action="{{ url('/inquiries/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <div class="arrival-div arrival-dept">
                                <ul class="prices-two">
                                    <li>
                                        <input type="radio" id="purchase-radio" name="service" value="purchase" checked>
                                        <label for="purchase-radio">Purchase this house plan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="customize-radio" name="service" value="custom">
                                        <label for="customize-radio">Customize this house plan</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidebar-card-title">
                                <p>Your Information</p>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="full_name" placeholder="Owner Full Name" required>
                            </div>
                            <div class="review-form">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="mobile" placeholder="Your Phone Number" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="street" placeholder="Street/Village" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="ward" placeholder="Ward" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="city" placeholder="Town / City" required>
                            </div>
                            <div class="review-form">
                                <select class="select" name="country" required>
                                    <option value="Tanzania" selected>Tanzania</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Uganda">Uganda</option>
                                </select>
                            </div>
                            <div class="customize-block">
                                <div class="sidebar-card-title">
                                    <p>Customization Information</p>
                                </div>
                                <div class="review-form">
                                    <label>Decriptions</label>
                                    <textarea rows="5" placeholder="How would you like the plan to be?" name="description"></textarea>
                                </div>
                                <div class="review-form">
                                    <label>Supporting Image</label>
                                    <input type="file" name="support_image" class="form-control">
                                </div>
                            </div>
                            <div class="sidebar-card-title">
                                <p>Delivery Method</p>
                            </div>
                            <div class="arrival-div arrival-dept">
                                <ul class="files">
                                    <li>
                                        <input type="radio" id="radio8" name="delivery_method" value="free" checked>
                                        <label for="radio8"><span>Free</span>Send in WhatsApp or Email</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio6" name="delivery_method" value="print_1">
                                        <label for="radio6"><span>$10</span>Print 1 file and send to my location</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio7" name="delivery_method" value="print_4">
                                        <label for="radio7"><span>$65</span>Print 4 files, apply Architect stamp and send to my location</label>
                                    </li>
                                </ul>
                            </div>
                            <h5>Total Amount: $<span class="text-success total">{{ number_format($property->price) }}</span></h5>
                            <input type="hidden" value="{{ number_format($property->price) }}" name="amount" id="amount">
                            <div class="review-form submit-btn">
                                <button type="submit" class="btn-primary">Proceed to Payment</button>
                            </div>
                        </form>
                        <ul class="connect-us">
                            <li><a href="javascript:void(0);"><i class="feather-phone"></i>Clear</a></li>
                            <li><a href="https://api.whatsapp.com/send/?phone=+255762807944&text={{ urlencode('Hi! I would like to know more about '.$property->title) }}&link={{ $currentUrl }}&type=phone_number&app_absent=0"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-lg-8">
                @if(count($stages) > 0)
                <div class="sidebar-card">
                    <div class="sidebar-card-title">
                        <h5>Cost Estimate Per Stage</h5>
                    </div>
                    <ul class="list-details">
                        @foreach($stages as $stage)
                        <li>{{ $stage->name }} <span>{{ number_format($stage->pivot->price)." ".$property->currency }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(count($amenities) > 0)
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
                @endif

                <div class="collapse-card sidebar-card">
                    <h4 class="card-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">Reviews (0)</a>
                    </h4>
                    <div id="review" class="card-collapse collapse show  collapse-view">
                        <div class="review-card">
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
<script>
    var price = "{{ $property->price }}";

    $(document).ready(function() {
        $('.customize-block').css('display', 'none');
    });

    $('input:radio[name=service]').on('change', function() {
        var service = $('input:radio[name=service]:checked').val();
        if (service == "purchase") {
            price = "{{ $property->price }}";

            $('.purchase-block').css('display', 'block');
            $('.customize-block').css('display', 'none');
        } else {
            price = parseInt(price) / 2;

            $('.purchase-block').css('display', 'none');
            $('.customize-block').css('display', 'block');
        }

        $('.total').text(price);
        $('#amount').val(price);
    });

    $('input:radio[name=delivery_method]').on('change', function() {
        var delivery_method = $('input:radio[name=delivery_method]:checked').val();
        if (delivery_method == "print_1") {
            var amount = parseInt(price) + 10;
        } else {
            var amount = parseInt(price) + 65;
        }

        $('.total').text(amount);
        $('#amount').val(amount);
    });
</script>
@endsection