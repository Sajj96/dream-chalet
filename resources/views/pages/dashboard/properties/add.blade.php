@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/dropzonejs/dropzone.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Add Property')}}</h4>
                    </div>
                    <div class="card-body">
                        <form id="wizard_with_validation" method="POST">
                            <h3>Property Information</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Title*</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>House Type*</label>
                                        <select class="form-control" name="type" required>
                                            <option>Apartments</option>
                                            <option>Workspaces</option>
                                            <option>Commercial Building</option>
                                            <option>Hotels and Lodges</option>
                                            <option>Modern House Plans</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Price*</label>
                                            <input type="number" class="form-control" name="price" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label>Currency</label>
                                            <select class="form-control" name="currency" required>
                                                <option>Tanzania Shillings</option>
                                                <option>US Dollar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Bedrooms</label>
                                            <input type="number" class="form-control" name="bedroom">
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Bathrooms</label>
                                            <input type="number" class="form-control" name="bathroom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Floors</label>
                                            <input type="number" class="form-control" name="no_floor">
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Square Meter</label>
                                            <input type="number" class="form-control" name="sqmt">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Details</label>
                                        <textarea name="details" class="summernote-simple" id="" rows="5"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Property Photos</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Main Image*</label>
                                        <input type="file" class="form-control" name="main_image" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Other Images</label>
                                        <div class="dropzone" id="mydropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Amenities</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ asset('assets/dashboard/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/dashboard/bundles/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/bundles/jquery-steps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/bundles/dropzonejs/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/page/form-wizard.js') }}"></script>
<script>
    $(document).ready(function() {
        // DropzoneJS
        Dropzone.autoDiscover = false;

        Dropzone.options.dropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 20,
            maxFiles: 20,
            addRemoveLinks: true,
            maxFilesize: 1,
            dictDefaultMessage: "Drop your files here!",
        }

        var myDropzone = new Dropzone("#mydropzone", {
            url: "{{ route('home') }}"
        });

    });
</script>
@endsection
@include('partials.flash-message')