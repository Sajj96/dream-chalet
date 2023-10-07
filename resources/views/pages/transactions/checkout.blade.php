@extends('layouts.app', ['title' => 'Checkout | DCE | '.ucwords(str_replace('-',' ',request()->segment(count(request()->segments()))))." | " ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input/css/intlTelInput.css')}}">
@endsection

@section('content')
<section class="content inner-content">
    <div class="container">
        <div class="showing-result-head fixed bg-ink-blue">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="result-show">
                        <h3 class="text-white"><strong>Checkout</strong></h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    @if(auth()->check() == false)
                    <div class="sort-result">
                        <div class="price-range grid-head">
                            <div>
                                <p>Already a member?</p>
                            </div>
                            <div class="review-form">
                                <a href="{{ route('login') }}" class="bt btn-primary">Click here to login</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.session-message')
        <div class="row">
            <div class="col-lg-7">

                <div class="add-property-wrap card">
                    <h4 class="card-title">Billing Information</h4>
                    <div id="about" class="card-collapse collapse show">
                        <div class="add-property-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>First Name*</label>
                                        <input type="text" class="form-control" name="first_name" value="{{  $inquiry->name ?? old('first_name') }}" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Last Name*</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" name="email" value="{{  $inquiry->email ?? old('email') }}" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Phone</label>
                                        <input type="text" id="phone" class="form-control" value="{{  $inquiry->mobile ?? old('mobile') }}" name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Street*</label>
                                        <input type="text" class="form-control" name="street" value="{{ $inquiry->street ?? old('street') }}" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>City*</label>
                                        <input type="text" class="form-control" name="city" value="{{ $inquiry->city ?? old('city') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="review-form">
                                        <label>Country*</label>
                                        <select class="select" name="country" required>
                                            <option value="Tanzania" selected>Tanzania</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Uganda">Uganda</option>
                                        </select>
                                    </div>
                                </div>
                                @if(auth()->check() == false)
                                <div class="col-md-12">
                                    <div class="form-group review-form">
                                        <label for="">Account Password*</label>
                                        <small>This will enable you to access account next time</small>
                                        <div class="pass-group">
                                            <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                                            <span class="fas fa-eye toggle-password"></span>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="review-form">
                                        <label>Additional Information (optional)</label>
                                        <textarea class="form-control" rows="8" placeholder="Notes about your order"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-5 theiaStickySidebar">
                <div class="right-sidebar">

                    <div class="agent-list flex-fill bg-white">
                        <div class="agent-img">
                            <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}" class="property-img">
                                <img class="img-fluid" alt="Property Image" src="{{ $property->thumbnail }}" width="200" height="100">
                            </a>
                        </div>
                        <div class="agent-content">
                            <div class="agent-info">
                                <div class="agent-rating">
                                    <h6>
                                        <a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])}}">{!! $property->bedrooms .' Bedrooms - '. $property->title !!}</a>
                                    </h6>
                                </div>
                            </div>
                            <div>
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

                    <div class="sidebar-card mt-2 bg-gray">
                        <form action="{{ url('/inquiries/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <ul class="list-details con-list mb-3">
                                <li><span>Delivery Charges</span> ${{ $inquiry->delivery_fee ?? 0 }}</li>
                                <li><span>Subtotal</span> ${{ $price }}</li>
                                <li><span><strong>Total</strong></span> <h5>${{ $price }}</h5> </li>
                            </ul>
                            <div class="review-form submit-btn">
                                <button type="submit" class="btn-primary">Place Order</button>
                            </div>
                        </form>
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
<script src="{{ asset('assets/plugins/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/plugins/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/int_tel_input.js')}}"></script>
@endsection