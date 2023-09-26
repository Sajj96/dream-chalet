@if($message = Session::get('success'))
<script>
  iziToast.success({
    title: 'Congratulations!',
    message: '{{ $message }}',
    position: 'topRight'
  });
</script>
@endif

@if($message = Session::get('error'))
<script>
   iziToast.error({
    title: 'Ooops!',
    message: '{{ $message }}',
    position: 'topRight'
  });
</script>
@endif

@if($message = Session::get('warning'))
<script>
  iziToast.warning({
    title: 'Oops!',
    message: '{{ $message }}',
    position: 'topRight'
  });
</script>
@endif

@if($message = Session::get('info'))
<script>
  iziToast.info({
    title: 'Message!',
    message: '{{ $message }}',
    position: 'topRight'
  });
</script>
@endif

@if($errors->any())
@foreach ($errors->all() as $error)
<script>
  iziToast.error({
    title: 'Oops!',
    message: '{{ $error }}',
    position: 'topRight'
  });
</script>
@endforeach
@endif