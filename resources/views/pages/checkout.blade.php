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
                    <div class="sort-result">
                        <div class="price-range grid-head">
                            <div>
                                <p>Already a member?</p>
                            </div>
                            <div class="review-form">
                                <a href="" class="bt btn-primary">Click here to login</a>
                            </div>
                        </div>
                    </div>
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
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name">
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
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Phone</label>
                                        <input type="text" id="phone" class="form-control" name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>Street*</label>
                                        <input type="text" class="form-control" name="street" value="{{ old('street') }}" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review-form">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="review-form">
                                        <label>Country</label>
                                        <select class="select" name="country" required>
                                            <option value="Tanzania" selected>Tanzania</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Uganda">Uganda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group review-form">
                                        <label for="">Account Password</label>
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

                    <!-- <div class="sidebar-card mt-2 bg-gray"> -->
                        <div class="agent-list flex-fill bg-white">
                            <div class="agent-img">
                                <a href="agent-details.html" class="property-img">
                                    <img class="img-fluid" alt="Property Image" src="assets/img/rent/rent-list-01.jpg" width="200">
                                </a>
                            </div>
                            <div class="agent-content">
                                <div class="agent-info">
                                    <div class="agent-rating">
                                        <h6>
                                            <a href="agent-details.html">3 Bedrooms - Modern House</a>
                                        </h6>
                                    </div>
                                    <div class="list-feature">
                                        <span>$230</span>
                                    </div>
                                </div>
                                <div>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            2 Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            3 Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            10000 Sqft
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->

                    <div class="sidebar-card mt-2 bg-gray">
                        <form action="{{ url('/inquiries/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <ul class="list-details con-list mb-3">
                                <li><span>Delivery Charges</span> +1 321 456 9874</li>
                                <li><span>Subtotal</span> +1 897 654 1258</li>
                                <li><span><strong>Total</strong></span> +1 897 654 1258</li>
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