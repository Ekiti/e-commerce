@extends('layouts.auth')
@section('content')
<!-- {{ __('Register') }} -->
<section class="flex column center middle no-wrap col-lg-5 vh-100">
    <form class="shadowfy" method="POST" action="{{ route('register') }}">
        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
            <a href="/" >
                <img class="logo-login" src="./images/logo.svg" alt="Logo"></a>
                <p class="text-20"><b>Register</b></p>
                <p>create a {{$settings->name}} account</p>
            </div>

            <div class="form-element form-input">
                <input name="name" id="name" class="form-element-field" type="text" required autofocus/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="name">{{ __('Name') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
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

            <div class="form-element form-input">
                <input name="password_confirmation" id="password-confirm" class="form-element-field" type="password" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="password-confirm">{{ __('Confirm password') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('Register') }}</button>
            </div>
            </fieldset>
            <div class="flex center middle mar-15 text-14">
                <a href="#">Already registered</a>
                <p>&nbsp;|&nbsp;</p>
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
    </form>
</section>   
@endsection
