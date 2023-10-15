@extends('layouts.app', ['title' => 'Properties | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
<div class="section blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row loadMore">
                    @foreach($posts as $post)
                    <div class="col-lg-12 col-md-12 d-lg-flex item">
                        <div class="blog grid-blog">
                            <div class="blog-image-list">
                                <a href="{{ route('post.show', $post->id ) }}"><img class="img-fluid" src="{{ $post->thumbnail }}" width="856" height="326" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-list-date">
                                    <ul class="meta-item-list">
                                        <li class="blog-category mb-0">
                                            <a href="javascript:void(0)"><span>{{ $post->categoryName }}</span></a>
                                        </li>
                                        <li class="date-icon">
                                            <i class="fa-solid fa-calendar-days"></i> <span>{{ date('d M Y', strtotime($post->created_at))}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog-title"><a href="{{ route('post.show', $post->id ) }}">{{ $post->title }}</a></h3>
                                <p class="blog-description border-0 mb-0 pb-0">There are many variations of
                                    passages of lorem ipsum available, but the majority have...</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="rightsidebar">
                    <div class="card">
                        <h4>Categories</h4>
                        <ul class="blogcategories-list">
                            <li><a href="javascript:void(0)">Property</a></li>
                            <li><a href="javascript:void(0)">Villa</a></li>
                            <li><a href="javascript:void(0)">House</a></li>
                            <li><a href="javascript:void(0)">Guest House</a></li>
                            <li><a href="javascript:void(0)">Factory</a></li>
                            <li><a href="javascript:void(0)">Godown</a></li>
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