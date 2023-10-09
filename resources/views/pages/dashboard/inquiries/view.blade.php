@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/datatables/datatables.min.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Order Invoice</h2>
                            <div class="invoice-number">Order #{{ $inquiry->id }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ $inquiry->userName }}<br>
                                    {{ $inquiry->userStreet }},<br>
                                    {{ $inquiry->userWard }},<br>
                                    {{ $inquiry->userCity }}, {{ $inquiry->userCountry }}
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{ date('F d, Y', strtotime($inquiry->created_at)) }}<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Order Summary</div>
                        <!-- <p class="section-lead">All items here cannot be deleted.</p> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th data-width="40">#</th>
                                    <th>Property</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-center">Sample Photo</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="">{{ $property->title }}</a></td>
                                    <td class="text-center">{{ strtoupper($inquiry->type) }}</td>
                                    <td class="text-right">${{ number_format($inquiry->amount) }}</td>
                                    <td class="text-right">{{ $inquiry->photo_path}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="section-title">Order Note</div>
                                <p class="section-lead">{!! $inquiry->description !!}</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value">${{ number_format($inquiry->amount) }}</div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Delivery Fee</div>
                                    <div class="invoice-detail-value">${{ number_format($inquiry->delivery_fee) }}</div>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">${{ number_format($inquiry->amount + $inquiry->delivery_fee) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/dashboard/bundles/datatables/datatables.min.js')}}"></script>
@endsection