@extends('layouts.app_dashboard')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Properties')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ url('dashboard/properties/add') }}" class="btn btn-primary p-2"><i data-feather="plus-circle"></i> Add Property</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableExport">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>{{ __('Title')}}</th>
                                        <th>{{ __('Price')}}</th>
                                        <th>{{ __('Type')}}</th>
                                        <th>{{ __('Group')}}</th>
                                        <th>{{ __('Category')}}</th>
                                        <th>{{ __('Plan')}}</th>
                                        <th>{{ __('Created By')}}</th>
                                        <th>{{ __('Created On')}}</th>
                                        <th>{{ __('Status')}}</th>
                                        <th>{{ __('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@include('partials.flash-message')