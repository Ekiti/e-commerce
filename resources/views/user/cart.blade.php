@extends('layouts.main')
@section('title', 'Cart')
@section('description', 'Shop for your favourite shoe brands in Nigeria')
@section('content')
<section class="flex column middle col-lg-6">
    <section class="flex column no-wrap center col-lg-6">
        <h1 class="featured-header">Shopping cart</h1>
        <div class="flex flex-wrap center col-lg-6">
    @if (!Cart::isEmpty())
        <ul class="flex column middle cart-ul">
        @foreach ($data['cartContent'] as $cart)
            <li class="flex no-wrap middle cart-items">
                <div class="flex center middle cart-img-holder">
                    <a href="{{ route('product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}"><img src="{{ $cart->attributes->image }}" alt="{{ $cart->name }}"></a>
                </div>
                <div class="flex flex-wrap mar-lr">
                    <div class="flex no-wrap space-between first-cart-div">
                        <div class="flex">
                            <p><a href="{{ route('product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}">{{ str_limit($cart->name, $limit=10) }}</a></p>
                        </div>
                        <div class="flex">
                            <p>
                                @if ($cart->attributes->discount != 0 || $cart->attributes->discount != null)
                                    <del>N</del>{{ number_format($cart->attributes->discountedPrice, 2) }}
                                @else
                                    <del>N</del>{{ number_format($cart->price, 2) }}
                                @endif
                            </p>
                        </div>  
                    </div>
                    <div class="flex no-wrap space-between second-cart-div">
                        <div class="increment">
                            <a href="#" class="button add">+</a>
                            <input value="{{ $cart->quantity }}" class="in-screen product-amount-input" type="number" name="" id="" step="1" min="1" max="" inputmode="numeric">
                            <a href="#" class="button sub">-</a>
                        </div>
                        <div class="flex">
                            <a href="#" data-id="{{ $cart->id }}" class="close-button deleteOneItem">
                                <i class=" cart-delete-icon icon ion-md-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
        <div class="flex column no-wrap cart-summary">
            <div class="flex space-between">
                <p><b>Cart summary:</b></p>
                <p><b>{{ count(Cart::getContent()) }} Item(s)</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14">Sub-total:</p>
                <p><b>{{ number_format(Cart::getSubTotal(), 2) }}</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14">Delivery:</p>
                <p><b>10.00</b></p>
            </div>
            <div class="flex space-between">
                <p class="text-14"><b>TOTAL:</b></p>
                <p><b>{{ number_format($data['cartTotal'], 2) }}</b></p>
            </div>
            <div class="flex center">
                <a href="{{route('checkout.index')}}" class="like-button strong text-14">Continue to Checkout</a>
            </div>
        </div>
    @else
        <div class="flex middle column no-wrap mar-ub-30">
            <i class="flaticon-036-shopping-basket-1"></i>
            <p class="text-25">Your cart is empty</p>
        </div>
    @endif
        </div> 
    </section>
</section>
<script>
        let display = document.querySelectorAll('.in-screen');
        let plus = document.querySelectorAll('.add');
        let minus = document.querySelectorAll('.sub');
        var show = (arg)=>{
            display.forEach((element) => {
                element.value = arg;
            });
        }
        var oprate = (operator,operation)=>{
            operator.forEach((opp)=>{
                opp.addEventListener('click',(x)=>{
                    x.preventDefault();
                    if(operation == 'add'){
                        display.forEach((element) => {
                            let currentValue = Number(element.value);
                            element.value = Math.floor(currentValue+1); 
                        });
                    }else if(operation = 'minus'){
                        display.forEach((element) => {
                            let currentValue = Number(element.value);
                            element.value = Math.floor(currentValue-1);
                            if(element.value < 1){
                                element.value = 1;
                            }
                        });
                    }
                });
            });
        }
        oprate(plus,'add');
        oprate(minus,'minus');
    </script>
@section('main-scripts')
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection
@endsection