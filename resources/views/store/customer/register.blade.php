@extends('layouts.store.main')

@section('title', 'Register')

@section('description', 'Shop for your fashion items online at Morade Stores')

@section('styles')
    <link rel="stylesheet" href="{{ asset('store/css/jquery.selectbox.css') }}">
@endsection

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('store.home') }}" title="Home">Home</a></li>
                        <li class="active">Register Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="xs-margin half"></div>
    <div class="container">
        @include('layouts.admin.messages')
        {{-- <form action="{{ route('store.customer.register.submit') }}" method="POST" id="register-form"> --}}
        {{ Form::open(['route' => 'store.customer.register.submit', 'method' => 'POST', 'id' => 'register-form']) }}
            
            <div class="row">
                <div class="col-sm-6 padding-right-md">
                    <h2 class="color2">Your Personal Details</h2>
                    <div class="form-group">
                        <label for="firstname" class="form-label">Enter your first name<span class="required">*</span></label>
                        {{-- <input type="text" name="firstname" id="firstname" class="form-control input-lg"
                            required> --}}
                        {{ Form::text('firstname', null, ['id' => 'firstname', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="form-label">Enter your last name<span class="required">*</span></label>
                        {{-- <input type="text" name="lastname" id="lastname" class="form-control input-lg" required> --}}
                        {{ Form::text('lastname', null, ['id' => 'lastname', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Enter your e-mail<span class="required">*</span></label>
                        {{-- <input type="email" name="email" id="email" class="form-control input-lg" required> --}}
                        {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="telephone" class="form-label">Enter your telephone<span class="required">*</span></label>
                        {{-- <input type="text" name="phone" id="telephone" class="form-control input-lg"
                            required> --}}
                        {{ Form::text('phone', null, ['id' => 'telephone', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                </div>
                <div class="md-margin visible-xs clearfix"></div>
                <div class="col-sm-6 padding-left-md">
                    <h2 class="color2">Your Address</h2>
                    <div class="form-group">
                        <label for="address" class="form-label">Enter your address<span class="required">*</span></label>
                        {{-- <input type="text" name="address" id="address" class="form-control input-lg" required> --}}
                        {{ Form::text('address', null, ['id' => 'address', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="landmark" class="form-label">Enter Landmark</label>
                        {{-- <input type="text" name="landmark" id="landmark" class="form-control input-lg"> --}}
                        {{ Form::text('landmark', null, ['id' => 'landmark', 'class' => 'form-control input-lg']) }}
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label">Enter your city<span class="required">*</span></label>
                        {{-- <input type="text" name="city" id="city" class="form-control input-lg" required> --}}
                        {{ Form::text('city', null, ['id' => 'city', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="state" class="form-label">Enter your state<span class="required">*</span></label>
                        <div class="large-selectbox clearfix">
                            {{ Form::select('state', $data['statesArray'], null, ['id' =>'state', 'class' => 'selectbox']) }}
                            {{-- <select id="state" name="region" class="selectbox">
                                <option value="" selected="selected">- Select -</option>
                                <option value="Abuja FCT">Abuja FCT</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross River">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nassarawa">Nassarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                            </select> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg-margin2x"></div>
            <div class="row">
                <div class="col-sm-6 padding-right-md">
                    <h2 class="color2">Your Password</h2>
                    <div class="form-group">
                        <label for="password" class="form-label">Enter your password<span class="required">*</span></label>
                        {{-- <input type="password" name="password" id="password" class="form-control input-lg" required> --}}
                        {{ Form::password('password', ['id' => 'password', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Enter your password again<span class="required">*</span></label>
                        {{-- <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg"
                            required> --}}
                        {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control input-lg', 'required' => '']) }}
                    </div>
                </div>
                <div class="md-margin visible-xs clearfix"></div>
                <div class="col-sm-6 padding-left-md">
                    <h2 class="color2">Newsletter</h2>
                    <div class="form-group custom-checkbox-wrapper">
                        <span class="custom-checkbox-container">
                            {{-- <input type="checkbox" name="newsletter" value="newsletter">  --}}
                            {{ Form::checkbox('newsletter', 'newsletter') }}
                            <span class="custom-checkbox-icon"></span>
                        </span>
                        <span>I wish to subscribe to the Morade Stores newsletter.</span></div>
                    <div class="form-group custom-checkbox-wrapper">
                        <span class="custom-checkbox-container">
                            {{-- <input type="checkbox" name="policy" value="policy"> --}}
                            {{ Form::checkbox('policy', 'policy') }}
                            <span class="custom-checkbox-icon">
                            </span>
                        </span>
                        <span>I have reed and agree to the <a href="#">Privacy Policy.</a></span></div>
                    <div class="xs-margin"></div>
                    <input type="submit" class="btn btn-custom btn-lg" value="Create Account">
                </div>
            </div>
        {{-- </form> --}}
        {{ Form::close() }}
    </div>
    <div class="xlg-margin"></div>
@endsection

@section('main-scripts')
    <script src="{{ asset('store/js/jquery.selectbox.min.js') }}"></script>
@endsection