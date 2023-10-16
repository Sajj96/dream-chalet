@extends('layouts.blank', ['title' => 'Reset Password'])

@section('content')
<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>{{ __('Reset Password') }}</h1>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('forget.password.post') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">{{ __('Email Address') }} <span>*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100 btn-size">{{ __('Send Password Reset Link') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection