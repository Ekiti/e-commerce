@extends('layouts.main')
@section('content')
<!-- {{ __('Login') }} -->
<section class="flex column center middle no-wrap col-lg-6">
    <form class="shadowfy" method="POST" action="{{ route('user.changePassword') }}">
        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
                <p class="text-20"><b>Change Password</b></p>
                @include('components.message')
            </div>
            <div class="form-element form-input">
                <input name="currentpassword" id="currentpassword" class="form-element-field" placeholder=" " type="password" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="currentpassword">{{ __('Current Password') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input name="newpassword" id="newpassword" class="form-element-field" placeholder=" " type="password" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="newpassword">{{ __('New password') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input name="confirmpassword" id="confirmpassword" class="form-element-field" placeholder=" " type="password" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="confirmpassword">{{ __('Confirm password') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('Change Password') }}</button>
            </div>
        </fieldset>
    </form>
</section>                            
@endsection
