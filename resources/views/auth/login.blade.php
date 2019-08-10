@extends('layouts.auth')
@section('content')
<!-- {{ __('Login') }} -->
<section class="flex column center middle no-wrap col-lg-5 vh-100">
    <form class="shadowfy" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
                <a href="/" >
                <img class="logo-login" src="./images/logo.svg" alt="Logo"></a>
                <p class="text-20"><b>Login</b></p>
                <p>with your {{$settings->name}} account</p>
            </div>
            <div class="form-element form-input">
                <input name="email" id="email" class="form-element-field" type="email" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('E-Mail Address') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-element form-input">
                <input name="password" id="password" class="form-element-field" type="password" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="password">{{ __('Password') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-checkbox form-checkbox-inline">
                <label class="form-checkbox-label">
                    <input class="form-checkbox-field" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <i class="form-checkbox-button"></i>
                    <span>{{ __('Remember Me') }}</span>
                </label>
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('Login') }}</button>
            </div>
        </fieldset>
            <div class="flex center middle mar-15 text-14">
                <a href="{{ route('register') }}">Register</a>
                <p>&nbsp;|&nbsp;</p>
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </div>
    </form>
</section>                            
@endsection
