@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/datatables/datatables.min.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <img alt="image" src="{{ asset('assets/img/anonymous.jpg') }}" class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">{{ ucwords($user->name) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Address Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4">
                            <p class="clearfix">
                                <span class="float-left">
                                    Joined On
                                </span>
                                <span class="float-right text-muted">
                                    30-05-1998
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Street
                                </span>
                                <span class="float-right text-muted">
                                    {{ $user->street }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Ward
                                </span>
                                <span class="float-right text-muted">
                                    {{ $user->ward }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    City
                                </span>
                                <span class="float-right text-muted">
                                    {{ $user->city }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#order" role="tab" aria-selected="false">Orders</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="row">
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted">{{ $user->name }}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted">{{ $user->mobile }}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <strong>Location</strong>
                                        <br>
                                        <p class="text-muted">{{ $user->country }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="home-tab3">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>{{ __('Property')}}</th>
                                                <th>{{ __('Type')}}</th>
                                                <th>{{ __('Delivery Fee')}}</th>
                                                <th>{{ __('Price')}}</th>
                                                <th>{{ __('Made On')}}</th>
                                                <th>{{ __('Status')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $key=>$order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a class="text-info" href="{{ route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$order->property->title.' '.$order->property->houseTypeName.' '.$order->property->id))]) }}">{{ $order->propertyTitle }}</a></td>
                                                <td>{{ strtoupper($order->type) }}</td>
                                                <td>{{ number_format($order->delivery_fee,2) }}</td>
                                                <td>{{ number_format($order->amount,2) }}</td>
                                                <td>{{ date('M d Y',strtotime($order->created_at)) }}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                    <div class="badge badge-warning badge-shadow">Processing</div>
                                                    @else
                                                    <div class="badge badge-success badge-shadow">Completed</div>
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
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/dashboard/bundles/datatables/datatables.min.js')}}"></script>
@endsection