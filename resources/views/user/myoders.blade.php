@extends('layouts.main')
@section('title', 'My orders')
@section('description', 'All your orders made on shopaholiq.')
@section('content')
<section class="flex column middle col-lg-6">
    <section class="flex column no-wrap center col-lg-6">
        <h1 class="featured-header">Orders</h1>
        <div class="flex flex-wrap center col-lg-6">
    @if (count($orders) > 0)
        <ul class="flex column middle cart-ul">
        @foreach ($orders as $order)
            <li class="flex no-wrap middle cart-items">
                <div class="flex center middle cart-img-holder">
                    <a class="flex middle" href="#"><img src="{{ $order->product_image }}" alt="{{ $order->product->name }}"></a>
                </div>
                <div class="flex middle flex-wrap mar-lr">
                    <div class="flex no-wrap space-between first-cart-div">
                        <div class="flex">
                            <p><a class="flex middle order-name" href="#">{{ str_limit($order->product->name, $limit=17) }} <span class="vr">X {{ $order->product_qty }}</span> </a></p>
                        </div> 
                    </div>
                    <div class="flex user-ostat">
                        @if($order->status === 'pending')
                            <p class="flex order-status-user pending">
                        @elseif($order->status === 'confirmed')
                        <p class="flex order-status-user succesx">
                        @else
                        <p class="flex order-status-user danger">
                        @endif
                            {{$order->status}}</p>
                    </div>
                </div>
                
            </li>
        @endforeach
        </ul>
    @else
        <div class="flex middle column no-wrap mar-ub-30">
            <i class="flaticon-036-shopping-basket-1"></i>
            <p class="text-25">You have no order currently</p>
        </div>
    @endif
        </div> 
    </section>
</section>
@section('main-scripts')
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
@endsection