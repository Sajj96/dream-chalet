@extends('layouts.app_dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/dropzonejs/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dashboard/bundles/select2/dist/css/select2.min.css') }}">
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
                        <form id="wizard_with_validation" action="{{ url('dashboard/properties/add') }}" method="POST" enctype="multipart/form-data">
                            <h3>Property Information</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Title*</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label>House Type*</label>
                                        <select class="form-control select2" name="type" required>
                                            @foreach($house_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Price*</label>
                                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter price" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label>Currency</label>
                                            <select class="form-control" name="currency" required>
                                                <option value="TZS">Tanzania Shillings</option>
                                                <option value="USD">US Dollar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Bedrooms</label>
                                            <input type="number" class="form-control" name="bedroom" value="{{ old('bedroom') }}" placeholder="Enter number of bedroom(s)">
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Bathrooms</label>
                                            <input type="number" class="form-control" name="bathroom" value="{{ old('bathroom') }}" placeholder="Enter number of bathroom(s)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">No. of Floors</label>
                                            <input type="number" class="form-control" name="no_floor" value="{{ old('no_floor') }}" placeholder="Enter number of floor(s)">
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Plot Size</label>
                                            <input type="number" class="form-control" name="sqmt" value="{{ old('sqmt') }}" placeholder="Enter plot size">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Details</label>
                                        <textarea name="details" class="summernote-simple" id="" placeholder="Type property details" rows="5">{{ old('details') }}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Property Photos</h3>
                            <fieldset>
                                <div class="row">
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Main Photo</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="main_image" id="image-upload" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-float col-6">
                                        <div class="form-line">
                                            <label class="form-label">Floor Plan Photo</label>
                                            <div id="image-preview-floor" class="image-preview">
                                                <label for="image-upload" class="image-label" id="image-label-floor">Choose File</label>
                                                <input type="file" name="floor_image" id="image-upload-floor" required class="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Other Images</label>
                                        <div class="dropzone" id="mydropzone">
                                            <div class="dz-message needsclick">
                                                Drop files here or click to upload
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Amenities &amp; Cost</h3>
                            <fieldset>
                                <h6>Amenities</h6>
                                <hr>
                                <div class="row">
                                    @foreach($amenities as $amenity)
                                    <div class="col-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="{{ $amenity->id }}" name="amenities[]" class="custom-control-input" id="customCheck{{ $amenity->id }}">
                                            <label class="custom-control-label" for="customCheck{{ $amenity->id }}">{{ $amenity->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <h6 class="mt-3">Estimated Cost</h6>
                                <hr>
                                @foreach($house_stages as $stage)
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">{{ $stage->name }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="stages[{{ $stage->id }}]['price']" class="form-control" id="inputEmail3" placeholder="Enter {{ strtolower($stage->name) }} development cost">
                                    </div>
                                </div>
                                @endforeach
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
<script src="{{ asset('assets/dashboard/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    let addUrl = "{{ route('dashboard.property.add') }}";
    let propertyUrl = "{{ route('dashboard.property') }}";
    let token = "{{ csrf_token() }}";
</script>
<script src="{{ asset('assets/dashboard/js/page/form-wizard.js') }}"></script>

@endsection