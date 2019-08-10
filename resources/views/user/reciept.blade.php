@extends('layouts.main')
@section('title', 'shoemaka | online shoping for shoes')
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
    <section class="flex center middle">
        <div class="flex column middle no-wrap reciept-card">
            <div class="flex row center middle">
                <div class="flex column middle">
                    <img class="reciept-logo" src="{{ asset('images/logo.svg') }}" alt="shoemaka logo">
                    <i class="ft-check-circle" style="color: green; font-size: 50px; margin-bottom: 10px;"></i>
                    <p>Payment & Order completed succesfully</p>
                    <p><a class="like-button" href="#">continue shopping</a></p>
                </div>
                <div class="flex column flex-start">
                    <p></p>
                </div>
            </div>
        </div>
    </section>
@endsection