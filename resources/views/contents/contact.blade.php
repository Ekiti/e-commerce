@extends('layouts.main')
@section('title', 'Contact')
@section('description', 'Contact information.')
@section('content')
    <section class="flex column center middle col-lg-6">
        <div class="flex center middle col-lg-6 hero-2" style="background: url({{ URL::asset('./images/shoes.jpg') }}) center center; background-size: 100% auto;">
            <h1 class="flex center middle">How can we help you?</h1>
        </div>
        <div class="flex center col-lg-5">
            <div class="flex middle column center col-lg-5">
                <ul class="flex flex-wrap contact-ul col-lg-4 space-between">
                    <li class="flex column middle no-wrap">
                        <i class="flaticon-038-customer-service-1"></i>
                        <p class='strong'>Call us</p>
                        <p>{{$settings->phone}}</p>
                    </li>
                    <li class="flex column middle no-wrap">
                        <i class="flaticon-025-shopping-basket"></i>
                        <p class='strong'>Send us a mail</p>
                        <p>{{$settings->email}}</p>
                    </li>
                    <li class="flex column middle no-wrap">
                        <i class="flaticon-041-pointer"></i>
                        <p class='strong'>Visit us</p>
                        <p>{{$settings->address}}</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection