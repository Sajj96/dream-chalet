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
                        <h4>{{ __('Users')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
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
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script>
    $(function() {
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["users-table"] = $("#users-table").dataTable({
            "serverSide": true,
            "processing": true,
            "ajax": "{{ route('dashboard.user') }}",
            "columns": [{
                    "data": "DT_RowIndex",
                    "name": "id",
                    "title": "Id",
                    "orderable": true,
                    "searchable": true
                }, {
                    "data": "name",
                    "name": "name",
                    "title": "Name",
                    "orderable": true,
                    "searchable": true
                }, {
                    "data": "email",
                    "name": "email",
                    "title": "Email",
                    "orderable": true,
                    "searchable": true
                }, {
                    "data": "mobile",
                    "name": "mobile",
                    "title": "Mobile",
                    "orderable": true,
                    "searchable": true
                }, {
                    "data": "city",
                    "name": "city",
                    "title": "City",
                    "orderable": true,
                    "searchable": true
                }, {
                    "data": "created_at",
                    "name": "created_at",
                    "title": "Joined On",
                    "orderable": true,
                    "searchable": true
                },
                {
                    "data": "action",
                    "name": "action",
                    "title": "Action",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "dom": "Bfrtip",
            "order": [
                [0, "desc"]
            ],
            "select": {
                "style": "single"
            },
            "buttons": [{
                "extend": "excel"
            }, {
                "extend": "print",
                "title": 'Users_' + time,
            },{
                "extend": "pdf"
            }]
        });

    });
</script>
@endsection