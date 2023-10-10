@extends('layouts.app', ['title' => 'Properties | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
<div class="section blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-banner">
                    <div class="blog-banner-img">
                        <img src="{{ $post->thumbnail }}" alt="img">
                    </div>
                    <div class="blog-banner-content">
                        <div class="blog-banner-contenthead">
                            <h6>{{ $post->categoryName }}</h6>
                            <h5>{{ $post->title }}</h5>
                        </div>
                        <div class="blog-detailset">
                            <i class="fa-solid fa-calendar-days"></i> <span class="ms-2">{{ date('d M Y', strtotime($post->created_at))}}</span>
                        </div>
                    </div>
                </div>
                <div class="blog-para-content">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="feature-property-sec blog-details-sec">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Related Posts</h2>
            <div class="sec-line mb-0">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-slider testimonialnext-prev owl-carousel">
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="javascript:void(0);"><img src="assets/img/blog/blog-1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Property</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="javascript:void(0);">How to achieve financial independence</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-01.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Rafael</a>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="javascript:void(0);"><img src="assets/img/blog/blog-2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Condos</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="javascript:void(0);">The most popular cities for homebuyers</a>
                                </h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-03.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">John</a>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="javascript:void(0);"><img src="assets/img/blog/blog-3.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Flat</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="javascript:void(0);">Learn how real estate really shapes our
                                        future</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-05.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Eric Krok</a>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="javascript:void(0);"><img src="assets/img/blog/blog-2.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Villa</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="javascript:void(0);">The most popular cities for homebuyers</a>
                                </h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-07.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Francis</a>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span><i class="fa-solid fa-arrow-right"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-img">
                            <a href="javascript:void(0);"><img src="assets/img/blog/blog-1.jpg" alt="Blog Image"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-property">
                                <span>Godown</span>
                            </div>
                            <div class="blog-title">
                                <h3><a href="javascript:void(0);">How to achieve financial independence</a></h3>
                                <p>There are many variations of passages of lorem ipsum available.</p>
                            </div>
                            <ul class="property-category d-flex justify-content-between align-items-center">
                                <li class="user-info">
                                    <a href="javascript:void(0);"><img src="assets/img/profiles/avatar-03.jpg" class="img-fluid avatar" alt="User"></a>
                                    <div class="user-name">
                                        <a href="javascript:void(0);">Rafael</a>
                                        <p>Posted on : 15 Jan 2023</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span><i class="fa-solid fa-arrow-right"></i></span></a>
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

    $('.bedroom').on('select2:select', function(e) {
        var link = e.params.data.id;
        window.location = link;
    })
</script>
@endsection