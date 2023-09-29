@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/datatables/datatables.min.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Development Stages')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('dashboard.stage.add') }}" class="btn btn-primary p-2"><i data-feather="plus-circle"></i> Add stage</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>{{ __('Name')}}</th>
                                        <th>{{ __('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stages as $stage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $stage->name }}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $stage->id }}').submit();">Delete</a>
                                            <form id="delete-form-{{ $stage->id }}" action="{{ url('/dashboard/development-stages/delete') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                                            </form>
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
</section>
@endsection
@section('scripts')
<script src="{{ asset('assets/dashboard/bundles/datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#table1").dataTable();
    });
</script>
@endsection