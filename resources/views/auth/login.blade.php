@extends('layouts.kami')

@section('content')
<div class="card ">
    <div class="card-header text-center">
        <a href="">
            <img class="logo-img col-xl-8" src="{{ url('images/indeks-kami.png') }}" alt="logo">
        </a>
    </div>
    <div class="card-body">

        <span class="splash-description">{{ __('Login') }}</span>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="custom-control-label">{{ __('Remember Me') }}</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
        </form>
    </div>
    <div class="card-footer bg-white p-0  ">
        @if (Route::has('register'))
        <div class="card-footer-item card-footer-item-bordered">
            <a href="{{ route('register') }}" class="footer-link">Create An Account</a>
        </div>
        @endif
        <div class="card-footer-item card-footer-item-bordered">
            @if (Route::has('password.request'))
            <a class="footer-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </div>
</div>

@endsection
