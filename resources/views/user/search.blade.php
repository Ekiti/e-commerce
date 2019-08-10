@extends('layouts.main')
@section('title', 'shoemaka | online shoping for shoes')
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
<section class="flex column no-wrap col-lg-5 mobilize-width">
    <div class="flex featured-header">
        <h1>Search result:</h1>
        <p>
            {{$query}}
        </p>
    </div>
@if(count($articles) < 1)
    <div class="flex column middle col-lg-6">
        <h5>No result found</h5>
    </div>
@else
<ul class="flex flex-wrap shoemaka-featured">
@foreach ($articles as $product)
    <li class="flex column no-wrap">
        <div class="flex featured-shoe">
            <a href="{{ route('product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}">
                <img src="{{ $product->images[0]->getImageSource() }}" alt="{{ $product->name }} hover" class="">
            </a>
        </div>
        <div class="flex column no-wrap featured-shoe-text">
            <p class="text-14">{{ str_limit($product->name, $limit=17) }}</p>
            <p class="money"> <b>{{ number_format($product->price, 2) }}</b></p>
        </div>
    </li>
@endforeach
</ul>
@endif
</section>

</section>
@endsection