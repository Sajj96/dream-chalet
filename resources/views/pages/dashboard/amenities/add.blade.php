@extends('layouts.app_dashboard')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Amenity</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dashboard/amenities/add') }}" method="post">
                            @csrf
                            <div class="group">
                                <div class="form-group row clone mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amenity Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="amenity[]" placeholder="" aria-label="">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="add-btn" type="button">Add Another</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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
<script>
    $(document).on('click', '#add-btn', function() {

        var html = `
            <div class="form-group row clone mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amenity Name</label>
                <div class="col-sm-12 col-md-7">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="amenity[]" placeholder="" aria-label="">
                        <div class="input-group-append">
                            <button class="btn btn-danger remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $(".group").append(html);

    });

    $("body").on("click", ".remove", function() {
        $(this).parents(".clone").remove();
    });
</script>
@endsection