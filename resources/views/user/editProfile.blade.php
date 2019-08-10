@extends('layouts.main')
@section('title', 'Edit profile')
@section('content')
<!-- {{ __('Login') }} -->
<section class="flex column center middle no-wrap col-lg-6">
{{ Form::model($user, ['route' => ['profile.update', Auth::user()->id], 'method' => 'PUT', 'class' => 'shadowfy']) }}

        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
                <p class="text-20"><b>Edit Account Information</b></p>
                <!-- <p>shoeMaka account</p> -->
            </div>
            @include('components.message')
            <div class="form-element form-input">
            <!-- {{ Form::label('name', 'Category Name') }} -->
                {{ Form::text('name', null, ['class' => 'form-element-field']) }}

                <!-- <input name="name" id="name" class="form-element-field" placeholder=" " type="text" required value=" {{ Auth::user()->name }} "/> -->
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('Name') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-element form-input">
                <input name="email" id="email" class="form-element-field" placeholder=" " type="email" required value=" {{Auth::user()->email}} "/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="email">{{ __('E-Mail Address') }}</label>
                <small class="form-element-hint"></small>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('save changes') }}</button>
            </div>
        </fieldset>
    {{ Form::close() }}
</section>                            
@endsection
