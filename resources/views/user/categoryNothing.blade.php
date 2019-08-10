@extends('layouts.main')
@section('title')
{{ $category }}
@endsection
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
<section class="flex column no-wrap col-lg-5 mobilize-width">
    <div class="flex featured-header">
        <h1>Category:</h1>
        <p>
            {{ $category }}
        </p>
    </div>
        <div class="flex column no-wrap col-lg-6 middle mar-ub-30">
            <i class="flaticon-036-shopping-basket-1"></i>
            <p class="text-25">No product found</p>
            <a href="/">continue shopping</a>
        </div>

</section>

</section>
@endsection