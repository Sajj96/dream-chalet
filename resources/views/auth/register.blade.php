@extends('layouts.blank', ['title' => 'Register'])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input/css/intlTelInput.css')}}">
@endsection

@section('content')
<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>{{ __('Signup!') }}'</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{ __('Name') }} <span>*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Email') }} <span>*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Mobile') }} <span>*</span></label>
                        <input type="tel" id="phone" name="mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Password') }} <span>*</span></label>
                        <div class="pass-group">
                            <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                            <span class="fas fa-eye toggle-password"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Confirm Password') }} <span>*</span></label>
                        <div class="pass-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100 btn-size">{{ __('Sign Up') }}</button>

                    <div class="text-center dont-have">{{ __('Already have login ?') }}' <a href="{{ route('login') }}">{{ __('Sign In') }}</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/plugins/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/int_tel_input.js')}}"></script>
@endsection