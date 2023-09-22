@extends('layouts.blank', ['title' => 'Login'])

@section('content')
<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>{{ __('Hey There!!! Welcome Back.')}}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{ __('Email Address') }} <span>*</span></label>
                        <input id="email" type="email" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" placeholder="Enter Email" required autofocus>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('Password') }} <span>*</span></label>
                        <div class="pass-group">
                            <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                            <span class="fas fa-eye toggle-password"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                    <div class="form-group mb-5">
                        <a class="forgot-link" href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}</a>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="custom_check mt-0 mb-0"><span>{{ __('Remember me') }}</span>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <a href="index.html" class="btn btn-outline-light w-100 btn-size">{{ __('Sign In') }}</a>

                    <div class="text-center dont-have">{{ __('Don\'t have an account ?') }} <a href="{{ route('register') }}">{{ __('Sign Up') }}</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection