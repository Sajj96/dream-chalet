@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oops!</strong> {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Ooops!</strong> {{ $message }}
</div>
@endif

@if($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Message!</strong> {{ $message }}
</div>
@endif

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Ooops!</strong> {{ $error }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif