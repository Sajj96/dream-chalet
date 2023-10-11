@extends('layouts.app', ['title' => 'Property | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])
@php use Illuminate\Support\Facades\URL; $currentUrl = URL::current(); @endphp

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input/css/intlTelInput.css')}}">
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
                    <div class="rating">
                        <span class="rating-count">
                            <i class="fa-solid fa-star checked"></i>
                            <i class="fa-solid fa-star checked"></i>
                            <i class="fa-solid fa-star checked"></i>
                            <i class="fa-solid fa-star checked"></i>
                            <i class="fa-solid fa-star checked"></i>
                        </span>
                        <h6 class="rating-review text-white"><span>{{ number_format($property->review->rate, 1) }}</span>({{ $property->review->review_count }} Reviews)</h6>
                    </div>
                    <p>${{ number_format($property->price) }}</p>
                    <ul class="other-pages">
                        <li><a href="compare.html"><i class="feather-git-pull-request"></i>Add to Compare</a>
                        </li>
                        <li><a href="javascript:void(0);"><i class="feather-heart"></i>Add to Wishlist</a></li>
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
                                <img src="{{ $property->thumbnail }}" width="800" alt="Slider">
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
                                <p>{{ $property->blocks }} Blocks</p>
                            </li>
                            <li>
                                <img src="{{ asset('assets/img/roof.png')}}" width="40" alt="Image">
                                <p>{{ $property->roofs }} Roofing Sheets</p>
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
                            @if($property->hasUserSubscribed)
                            <img src="{{ $property->premium_image }}" alt="Image">
                            <div class="review-form submit-btn">
                                <a href="{{ route('property.download', $property->id) }}" class="btn-primary"><i class="bx bx-download bx-sm ml-3"></i> Download</a>
                            </div>
                            @else
                            <img src="{{ $property->floor_image }}" alt="Image">

                            <div class="price-card premium">
                                <div class="price-sticker">
                                    <img src="{{ asset('assets/img/icons/pricing-icon.svg')}}" alt="price-sticker">
                                </div>
                                <div class="price-title">
                                    <h3>Upgrade To Premium</h3>
                                    <p>Subscribe to see clear floor plan before purchasing this drawings.</p>
                                </div>
                                <form action="{{ url('/transactions/checkout') }}" method="get">
                                    <input type="hidden" name="property" value="{{ $property->id }}">
                                    <div class="arrival-div">
                                        <ul class="prices">
                                            @foreach($plans as $plan)
                                            <li>
                                                <input type="radio" id="radio{{ $plan->id }}" value="{{ $plan->id }}" @if($plan->type == 'Professional') checked @endif value="{{ $plan->id }}" name="plan">
                                                <label for="radio{{ $plan->id }}">Per {{ $plan->period }}<span>${{ $plan->price }}</span>{{ $plan->type }}</label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="price-btn">
                                        <button type="submit" class="btn-primary d-xl-block d-lg-block d-md-none d-sm-none d-none" style="width: 100%;">Pay Now</button>
                                        <a href="#" class="d-lg-none d-xl-none d-md-block d-sm-block d-block" data-bs-toggle="modal" data-bs-target="#success">Pay Now Small</a>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 theiaStickySidebar">
                <div class="right-sidebar">

                    <div class="sidebar-card mt-3">
                        <div class="sidebar-card-title">
                            <h5>Share this Property</h5>
                        </div>
                        <div class="social-links">
                            <ul class="sidebar-social-links">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}" class="fb-icon"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $property->title }}" class="twitter-icon"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
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
                            <input type="hidden" name="property" value="{{ $property->id }}">
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
                                <input type="text" class="form-control" name="full_name" value="{{ auth()->user()->name ?? old('full_name') }}" placeholder="Owner Full Name" required>
                            </div>
                            <div class="review-form">
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email ?? old('email') }}" placeholder="Your Email Address" required>
                            </div>
                            <div class="review-form">
                                <input type="tel" id="phone" class="form-control" name="mobile" value="{{ auth()->user()->mobile ?? old('mobile') }}" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="street" value="{{ auth()->user()->street ?? old('street') }}" placeholder="Street/Village" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="ward" value="{{ auth()->user()->ward ?? old('ward') }}" placeholder="Ward" required>
                            </div>
                            <div class="review-form">
                                <input type="text" class="form-control" name="city" value="{{ auth()->user()->city ?? old('city') }}" placeholder="Town / City" required>
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
                                        <input type="radio" id="radio8" name="delivery_fee" value="0" checked>
                                        <label for="radio8"><span>Free</span>Send in WhatsApp or Email</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio6" name="delivery_fee" value="10">
                                        <label for="radio6"><span>$10</span>Print 1 file and send to my location</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="radio7" name="delivery_fee" value="65">
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
                        <li>{{ $stage->name }} <span>{{ ($property->hasUserSubscribed) ? '$'.number_format($stage->stagePrice) : 'Subscribers only' }}</span></li>
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
                                <form action="{{ route('review.create') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="review-form">
                                                <label for="">Your Name</label>
                                                <input type="text" class="form-control" name="full_name" value="{{ auth()->user()->name ?? ''}}" placeholder="Your Name">
                                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="review-form">
                                                <label for="">Your Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email ?? ''}}" placeholder="Your Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="review-form">
                                                <label class="review-label">Star Ratings</label>
                                                <div class="rate list-inline">
                                                    <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                                    <label for="star5" title="5 stars">5 stars</label>
                                                    <input type="radio" id="star4" class="rate" name="rating" value="4" />
                                                    <label for="star4" title="4 stars">4 stars</label>
                                                    <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                                    <label for="star3" title="3 stars">3 stars</label>
                                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                    <label for="star2" title="2 stars">2 stars</label>
                                                    <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                                    <label for="star1" title="1 star">1 star</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="review-form">
                                                <label for="">Comment</label>
                                                <textarea rows="5" placeholder="Enter Your Comments" name="comment"></textarea>
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
                    </div>
                </div>
            </div>
        </div>

        @if(count($similar_properties) > 0)
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

                        @foreach($similar_properties as $similar_property)
                        <div class="product-custom">
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$similar_property->title.' '.$similar_property->houseTypeName.' '.$similar_property->id))]) }}" class="property-img">
                                        <img class="img-fluid" alt="Property Image" src="{{ $similar_property->thumbnail }}" />
                                    </a>
                                    <div class="product-amount">
                                        <span>${{ number_format($similar_property->price) }}</span>
                                    </div>
                                    <div class="feature-rating">
                                        <div>
                                            <div class="featured">
                                                <span>{{ $similar_property->houseTypeName }}</span>
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
                                        <p class="rating-review"><span>{{ number_format($similar_property->review->rate, 1) }}</span>({{ $similar_property->review->review_count }} Reviews)</p>
                                    </div>
                                    <h3 class="title">
                                        <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$similar_property->title.' '.$similar_property->houseTypeName.' '.$similar_property->id))]) }}" tabindex="-1">{!! $similar_property->bedrooms .' Bedrooms - '. $similar_property->title !!}</a>
                                    </h3>
                                    <ul class="d-flex details">
                                        <li>
                                            <i class="fas fa-bed fa-1x text-secondary mx-1"></i>
                                            {{ $similar_property->bedrooms ?? 0 }} Beds
                                        </li>
                                        <li>
                                            <i class="fas fa-trowel-bricks fa-1x text-secondary mx-1"></i>
                                            {{ $similar_property->blocks ?? 0 }} Blocks
                                        </li>
                                        <li>
                                            <i class="fas fa-sheet-plastic fa-1x text-secondary mx-1"></i>
                                            {{ $similar_property->roofs }} Roofing Sheets
                                        </li>
                                        <li>
                                            <i class="fas fa-ruler-horizontal fa-1x text-secondary mx-1"></i>
                                            {{ $similar_property->square_meter }} Sqrm
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<div class="modal fade modal-succeess" id="success" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select you desired plan to continue</p>
                <div class="advanced-search">
                    <form action="{{ url('/transactions/checkout') }}" method="get">
                        <input type="hidden" name="property" value="{{ $property->id }}">
                        <div class="arrival-div">
                            <ul class="prices-2">
                                @foreach($plans as $plan)
                                <li>
                                    <input type="radio" id="radio{{ $plan->id }}-2" value="{{ $plan->id }}" @if($plan->type == 'Professional') checked @endif value="{{ $plan->id }}" name="plan">
                                    <label for="radio{{ $plan->id }}-2">Per {{ $plan->period }}<span>${{ $plan->price }}</span>{{ $plan->type }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="price-btn">
                            <button type="submit" class="btn-primary d-block" style="width: 100%;">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('assets/plugins/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/plugins/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/int_tel_input.js')}}"></script>
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
    });

    var amount = 0;

    $('input:radio[name=delivery_fee]').on('change', function() {
        var delivery_fee = $('input:radio[name=delivery_fee]:checked').val();
        if (delivery_fee == "10") {
            amount = parseInt(price) + 10;
        } else if (delivery_fee == "65") {
            amount = parseInt(price) + 65;
        } else {
            amount = "{{ $property->price }}";
        }

        $('.total').text(amount);
    });
</script>
@endsection