@extends('layouts.auth')
@section('content')
<section class="flex column center middle no-wrap col-lg-5 vh-100">
    <form action="{{ route('password.update') }}" id="login-form" method="POST" class="shadowfy">
        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
                <a href="/" >
                <img class="logo-login" src="{{ URL::asset('./images/logo.svg') }}" alt="Logo"></a>
                <p class="text-14 mar-15">If you dont have an account please register.</p>
                <p></p>
            </div>
            <div class="form-element form-input">
                <input name="email" id="email" class="form-element-field" value="{{ old('email') }}" type="email" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('Enter your email address') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-element form-input">
                <input name="password" id="email" class="form-element-field" value="{{ old('password') }}" type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('Enter a new password') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-element form-input">
                <input name="password_confirmation" id="email" class="form-element-field" value="{{ old('email') }}" type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('Retype your password') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('Reset password') }}</button>
            </div>
        </fieldset>
            <div class="flex center middle mar-15 text-14">
                <a href="{{ route('login') }}">Login</a>
            </div>
    </form>
</section>                            
@endsection