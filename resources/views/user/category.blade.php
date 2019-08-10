@extends('layouts.main')
@section('title')
{{ $data['category']->name }}
@endsection
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
<section class="flex column no-wrap col-lg-5 mobilize-width">
    <div class="flex featured-header">
        <h5>Category:</h5>
        <p>
        @if(is_object($data['category']))
            {{ $data['category']->name }}
        @else
            {{ $data['category'] }}
        @endif
        </p>
    </div>
    @if ($data['products']->count() != 0 )
    <ul class="flex flex-wrap shoemaka-featured">
        @foreach ($data['chunks'] as $chunk)
            @foreach ($chunk as $product)
            <li class="flex column no-wrap">
                <div class="flex featured-shoe">
                    @if ($product->discount != 0)
                        <span class="discount-box top-left"> -{{ $product->discount }}%</span>
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
        @endforeach
    </ul>
    @else
        <div class="flex column no-wrap col-lg-6 middle mar-ub-30">
            <i class="flaticon-036-shopping-basket-1"></i>
            <p class="text-25">No product found</p>
        </div>
    @endif
</section>

</section>
@endsection