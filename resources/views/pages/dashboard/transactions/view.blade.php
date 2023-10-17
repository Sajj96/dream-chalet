@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/datatables/datatables.min.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print" id="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <img src="{{ asset('assets/img/dce_logo.png') }}" width="100" alt="">
                            <h2>Transaction Invoice</h2>
                            <div class="invoice-number">Transaction #{{ $transaction->id }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ $transaction->userName }}<br>
                                    {{ $transaction->userStreet }},<br>
                                    {{ $transaction->userWard }},<br>
                                    {{ $transaction->userCity }}, {{ $transaction->userCountry }}
                                </address>
                                @if($transaction->status == 1)
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    {{ $transaction->payment_method }}<br>
                                </address>
                                @endif
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Transaction Date:</strong><br>
                                    {{ date('F d, Y', strtotime($transaction->created_at)) }}<br>
                                    <strong>Status: </strong>
                                    @if($transaction->status == 0)
                                    <div class="badge badge-warning">PENDING</div><br>
                                    @elseif($transaction->status == 1)
                                    <div class="badge badge-success">PAID</div><br>
                                    @else
                                    <div class="badge badge-info">FAILED</div><br>
                                    @endif
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Transaction Summary</div>
                        <!-- <p class="section-lead">All items here cannot be deleted.</p> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tr>
                                    <th data-width="40">#</th>
                                    <th>Property</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-right">Price</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="">{{ $property->title }}</a></td>
                                    <td class="text-center">{{ strtoupper($transaction->type) }}</td>
                                    <td class="text-right">${{ number_format($transaction->amount) }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="section-title">Transaction Note</div>
                                <p class="section-lead">{!! $transaction->description !!}</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value">${{ number_format($transaction->amount) }}</div>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">${{ number_format($transaction->amount) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <button onclick="printPage()" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/dashboard/bundles/datatables/datatables.min.js')}}"></script>
<script>
    function printPage() {
        var printContents = document.getElementById('invoice-print').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection