@extends('layouts.app', ['title' => 'Properties | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
<div class="content inner-content">
    <div class="container">

        <div class="showing-result-head fixed bg-primary-dark">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="result-show">
                        <h5>Showing result <span>06</span> of <span>125</span></h5>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="sort-result">
                        <div class="sort-by grid-head">
                            <div>
                                <p>Sort By</p>
                            </div>
                            <div class="review-form">
                                <select class="select">
                                    <option value="0">Default</option>
                                    <option value="1">A-Z</option>
                                </select>
                            </div>
                        </div>
                        <div class="price-range grid-head">
                            <div>
                                <p>Price Range</p>
                            </div>
                            <div class="review-form">
                                <select class="select">
                                    <option>Low to High</option>
                                    <option>High to Low</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid-list-view">
                            <ul>
                                <li><a href="buy-property-list-sidebar.html"><i class="bx bx-filter-alt"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class=" for-rent p-0">
                    <div class="row">

                        @foreach($properties as $property)
                        <div class="col-lg-3">
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
                                                <i class="fas fa-bath fa-1x text-secondary mx-1"></i>
                                                {{ $property->bathrooms ?? 0 }} Baths
                                            </li>
                                            <li>
                                                <i class="fas fa-square fa-1x text-secondary mx-1"></i>
                                                {{ $property->square_meter }} Sqft
                                            </li>
                                            <li>
                                                <i class="fas fa-building fa-1x text-secondary mx-1"></i>
                                                {{ $property->floors }} Storeys
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="grid-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item prev">
                                <a class="page-link" href="#"><i class="fa-solid fa-arrow-left"></i> Prev</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item next">
                                <a class="page-link" href="#">Next <i class="fa-solid fa-arrow-right"></i></a>
                            </li>
                        </ul>
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
@endsection