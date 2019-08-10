@extends('layouts.main')
@section('title', 'Edit delivery address')
@section('content')
<!-- {{ __('Login') }} -->
<section class="flex column center middle no-wrap col-lg-6">
    <!-- <form class="shadowfy" method="POST" action="{{ route('address.store') }}"> -->
    {{ Form::model($address, ['route' => ['address.update', Auth::user()->id], 'method' => 'PUT', 'class' => 'shadowfy']) }}

        @csrf
        <fieldset class="form-fieldset col-lg-6">
            <div class="flex center middle col-lg-6 column no-wrap">
                <p class="text-20"><b>Delivery Addrress</b></p>
                @include('components.message')
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->name }} " name="name" id="name" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="name">{{ __('Full name') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->country }} " name="country" id="country" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="country">{{ __('Country') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->state }} " name="state" id="state" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="state">{{ __('State') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->city }} " name="city" id="city" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="city">{{ __('city') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->address }} " name="address" id="address" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="address">{{ __('address') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="form-element form-input">
                <input value=" {{ $address->phone }} " name="phone" id="phone" class="form-element-field" placeholder=" " type="text" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="phone">{{ __('phone') }}</label>
                <small class="form-element-hint"></small>
            </div>
            <div class="flex center">
                <button class="form-btn" type="submit">{{ __('save') }}</button>
            </div>
        </fieldset>
    {{ Form::close() }}
</section>                            
@endsection
