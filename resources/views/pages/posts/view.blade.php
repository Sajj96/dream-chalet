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