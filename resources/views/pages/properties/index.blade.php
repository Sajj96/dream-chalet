@extends('layouts.app', ['title' => 'Properties | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
<div class="content inner-content">
    <div class="container">

        <div class="showing-result-head fixed bg-ink-blue">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="result-show">
                        <h5>Showing <span>{{ count($properties) }}</span> results {{ substr(ucwords(request()->segment(count(request()->segments()))), 0, strpos(ucwords(request()->segment(count(request()->segments()))), "=")) }}</h5>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sort-result">
                        <div class="price-range grid-head">
                            <div>
                                <p>No. of Bedrooms</p>
                            </div>
                            <div class="review-form">
                                <select class="select bedroom" name="bedroom">
                                    <option value="{{ route('property', 'bedroom=1') }}">1 Bedroom</option>
                                    <option value="{{ route('property', 'bedroom=2') }}">2 Bedrooms</option>
                                    <option value="{{ route('property', 'bedroom=3') }}">3 Bedrooms</option>
                                    <option value="{{ route('property', 'bedroom=4') }}">4 Bedrooms</option>
                                    <option value="{{ route('property', 'bedroom=5') }}">5+ Bedrooms</option>
                                </select>
                            </div>
                        </div>
                        <div class="price-range grid-head">
                            <div>
                                <p>Price Range</p>
                            </div>
                            <div class="review-form">
                                <form action="{{ route('property') }}" id="sort_form">
                                    <select class="select range" name="sort_price">
                                        <option value="">Select Range</option>
                                        <option value="low_price">Low to High</option>
                                        <option value="high_price">High to Low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="for-rent p-0">
                    <div class="row loadMore">

                        @foreach($properties as $property)
                        <div class="col-lg-3 item">
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
                                            <h6 class="rating-review text-secondary"><span>{{ number_format($property->review->rate, 1) }}</span>({{ $property->review->review_count }} Reviews)</h6>
                                        </div>
                                        <h5 class="title">
                                            <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}">{!! $property->bedrooms .' Bedrooms - '. $property->title !!}</a>
                                        </h5>
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

        <div class="modal fade modal-succeess" id="success" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Advanced Search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="advanced-search">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <select class="select form-control">
                                            <option>Categories</option>
                                            <option>Apartments</option>
                                            <option>Condos </option>
                                            <option>Houses </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <select class="select form-control">
                                            <option>Bedrooms</option>
                                            <option>4 Bedrooms</option>
                                            <option>2 Bedrooms </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <select class="select form-control">
                                            <option>Bathrooms</option>
                                            <option>1 Bathrooms</option>
                                            <option>2 Bathrooms </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <input type="text" class="form-control" placeholder="Min Sqft">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <input type="text" class="form-control" placeholder="Min Price">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <input type="text" class="form-control" placeholder="Max Price">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <select class="select form-control">
                                            <option>Reviews</option>
                                            <option>1 Review</option>
                                            <option>2 Review</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="review-form form-wrap ">
                                        <input type="text" class="form-control" placeholder="Amenities">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="review-form-btn">
                                        <a href="javascript:void(0);" class="btn btn-primary">Apply Filter</a>
                                        <a href="javascript:void(0);" data-dismiss="modal" class="reset-btn">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.simpleLoadMore.js')}}"></script>
<script>
    $('.loadMore').simpleLoadMore({
        item: '.item',
        count: 10,
        itemsToLoad: 6,
        showCounter: true,
        btnHTML: '<div class="d-flex justify-content-center" data-aos="fade-down" data-aos-duration="1000"><a href="#" class="btn btn-primary bg-warning">Load More</a></div>'
    });

    $('.bedroom').on('select2:select', function(e) {
        var link = e.params.data.id;
        window.location = link;
    })

    $('.range').on('select2:select', function(e) {
        var form = $('#sort_form')[0];
        form.submit();
    })
</script>
@endsection