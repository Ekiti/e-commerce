@extends('layouts.main')
@section('title', 'Online shop')
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
<section class="flex col-lg-6">
@if(count($data['banner']) >= 1)
<ul class="flex no-wrap col-lg-6 hero">
    @foreach($data['banner'] as $banner)
    <li><img src="{{ $banner->getImageSource() }}" alt="Image"></li>
    @endforeach
</ul>
@endif
</section>
<section class="flex column no-wrap col-lg-5 mobilize-width">
<h1 class="featured-header">Featured items</h1>
<ul class="flex flex-wrap shoemaka-featured">
@foreach ($data['newArrivalRandomProducts'] as $product)
    <li class="flex column no-wrap">
        <div class="flex featured-shoe">
            @if ($product->discount != 0)
                <span class="discount-box top-left">-{{ $product->discount }}%</span>
            @endif
            <a href="{{ route('product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}">
                <img src="{{ $product->images[0]->getImageSource() }}" alt="{{ $product->name }} hover" class="">
            </a>
        </div>
        <div class="flex column no-wrap featured-shoe-text">
            <p class="text-14">{{ str_limit($product->name, $limit=17) }}</p>
           
            @if ($product->discount != 0)
                <div class="flex flex-wrap space-between">
                    <p class="money strikethrough"> {{ number_format($product->price, 2) }} </p>
                    <p class="money"> <b>{{ number_format($product->discountedPrice(), 2) }}</b></p>
                </div>
            @else
                <p class="money"> <b>{{ number_format($product->price, 2) }}</b></p>
            @endif
        </div>
    </li>
@endforeach
</ul>
<div class="flex center middle">
   {{ $data['newArrivalRandomProducts']->links() }}
</div>
</section>
</section>
@endsection