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
                        <h3 class="text-white"><strong>My Profile</strong></h3>
                    </div>
                </div>
                <div class="col-lg-9">
                </div>
            </div>
        </div>
        @include('partials.session-message')

        <div class="details-wrap">
            <div class="detail-user-wrap">
                <div class="detail-user-img">
                    <img src="{{ asset('assets/img/anonymous.jpg') }}" class="img-fluid" alt="Image">
                </div>
                <div class="user-wrap">
                    <div class="user-info-wrap">
                        <div class="detail-user-info">
                            <h3>{{ auth()->user()->name }}<i class="fa-solid fa-circle-check"></i></h3>
                            <p><i class="bx bx-user-check"></i>Verified User</p>
                        </div>
                    </div>
                    <ul class="mem-list">
                        <li><span>Member Since : </span>{{ date('d M Y', strtotime(auth()->user()->created_at)) }}</li>
                        <li><span>Email : </span>{{ auth()->user()->email }}</li>
                        <li><span>Phone Number : </span>{{ auth()->user()->mobile }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="agent-views">

                    <div class="add-property-wrap card pb-4">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">About Me</a>
                        </h4>
                        <div id="review" class="card-collapse collapse show  collapse-view">
                            <div class="review-card">
                                <div class="property-review">
                                    <form action="{{ route('profile') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="review-form">
                                                    <label>Full Name*</label>
                                                    <input type="text" class="form-control" name="full_name" value="{{  auth()->user()->name ?? old('full_name') }}" placeholder="Enter full name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>Email*</label>
                                                    <input type="email" class="form-control" name="email" value="{{  auth()->user()->email ?? old('email') }}" placeholder="Enter email address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>Phone</label>
                                                    <input type="text" id="phone" class="form-control" value="{{  auth()->user()->mobile ?? old('mobile') }}" name="mobile" style="padding: 10px 0px 10px 50px">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>Street*</label>
                                                    <input type="text" class="form-control" name="street" value="{{ auth()->user()->street ?? old('street') }}" placeholder="Enter street address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>Ward*</label>
                                                    <input type="text" class="form-control" name="ward" value="{{ auth()->user()->ward ?? old('ward') }}" placeholder="Enter ward">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>City*</label>
                                                    <input type="text" class="form-control" name="city" value="{{ auth()->user()->city ?? old('city') }}" placeholder="Enter city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-form">
                                                    <label>Country*</label>
                                                    <select class="select" name="country" required>
                                                        <option value="Tanzania" selected>Tanzania</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Uganda">Uganda</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group review-form">
                                                    <label for="">New Password*</label>
                                                    <div class="pass-group">
                                                        <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                                        <span class="fas fa-eye toggle-password"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="review-form submit-btn">
                                                    <button type="submit" class="btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#service-area" aria-expanded="false">Active Subscriptions</a>
                        </h4>
                        <div id="service-area" class="card-collapse collapse show">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead class="bg-primary-dark">
                                        <tr>
                                            <th class="text-white">Property</th>
                                            <th class="text-white">Type</th>
                                            <th class="text-white">Period</th>
                                            <th class="text-white">Start Date</th>
                                            <th class="text-white">End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subscriptions as $subscription)
                                        <tr>
                                            <td><a href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))]) }}">{{ $subscription->title }}</a></td>
                                            <td>{{ $subscription->planType }}</td>
                                            <td>{{ $subscription->planPeriod }}</td>
                                            <td>{{ date('d M Y', strtotime($subscription->pivot->updated_at)) }}</td>
                                            <td>{{ date('d M Y', strtotime($subscription->pivot->ends_on)) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="collapse-card">
                        <h4 class="card-title">
                            <a class="collapsed" data-bs-toggle="collapse" href="#service-area" aria-expanded="false">Active Subscriptions</a>
                        </h4>
                        <div id="service-area" class="card-collapse collapse show">
                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead class="bg-primary-dark">
                                        <tr>
                                            <th class="text-white">{{ __('Property')}}</th>
                                            <th class="text-white">{{ __('Type')}}</th>
                                            <th class="text-white">{{ __('Delivery Fee')}}</th>
                                            <th class="text-white">{{ __('Price')}}</th>
                                            <th class="text-white">{{ __('Made On')}}</th>
                                            <th class="text-white">{{ __('Status')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a class="text-info" href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$row->property->title.' '.$row->property->houseTypeName.' '.$row->property->id))]) }}">{{ $order->propertyTitle }}</a></td>
                                            <td>{{ strtoupper($order->type) }}</td>
                                            <td>{{ number_format($order->delivery_fee,2) }}</td>
                                            <td>{{ number_format($order->amount,2) }}</td>
                                            <td>{{ date('M d Y',strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if($order->status == 0)
                                                <div class="badge text-bg-warning">Processing</div>
                                                @else
                                                <div class="badge text-bg-success">Completed</div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 theiaStickySidebar">
                <div class="right-sidebar">

                    <div class="sidebar-card">
                        <div class="sidebar-card-title">
                            <h5>Address</h5>
                        </div>
                        <ul class="list-details con-list">
                            <li><span><i class="bx bx-buildings"></i>Street</span> {{ auth()->user()->street }}</li>
                            <li><span><i class="bx bx-current-location"></i>Ward</span> {{ auth()->user()->ward }}</li>
                            <li><span><i class="bx bx-map-pin"></i>City</span> {{ auth()->user()->city }}</li>
                            <li><span><i class="bx bx-globe"></i>Country</span> {{ auth()->user()->country }}</li>
                            </li>
                        </ul>
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