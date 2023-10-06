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
                        <h5>Showing <span>{{ count($properties) }}</span> result of {{ substr(ucwords(request()->segment(count(request()->segments()))), 0, strpos(ucwords(request()->segment(count(request()->segments()))), "=")) }}</h5>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sort-result">
                        <div class="price-range grid-head">
                            <div>
                                <p>Price Range</p>
                            </div>
                            <div class="review-form">
                                <select class="select" name="sort_price">
                                    <option value="low_price">Low to High</option>
                                    <option value="high_price">High to Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid-list-view">
                            <ul>
                                <li><a href="buy-property-list-sidebar.html" data-bs-toggle="modal" data-bs-target="#success"><i class="bx bx-filter-alt"></i></a></li>
                            </ul>
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
                                            <span>{{ number_format($property->price)." ".$property->currency }}</span>
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
                                        <h5 class="title">
                                            <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}">{!! $property->title !!}</a>
                                        </h5>
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
        count: 4,
        itemsToLoad: 4,
        showCounter: true,
        btnHTML: '<div class="d-flex justify-content-center" data-aos="fade-down" data-aos-duration="1000"><a href="#" class="btn btn-primary bg-warning">Load More</a></div>'
    });
</script>
@endsection