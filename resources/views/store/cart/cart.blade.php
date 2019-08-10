@extends('layouts.store.main')

@section('title', 'Shopping Cart')

@section('description', 'Shop for your fashion items online at Morade Stores')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('store.home') }}" title="Home">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if (!Cart::isEmpty())
            <div class="col-md-12">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th class="table-title">Product Name</th>
                            <th class="table-title">Product Code</th>
                            <th class="table-title">Unit Price</th>
                            <th class="table-title">Quantity</th>
                            <th class="table-title">SubTotal</th>
                            <th><span class="close-button deleteAll"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data['cartContent'] as $cart)
                        <tr>
                            <td class="product-name-col">
                                <figure>
                                    <a href="{{ route('store.product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}"><img src="{{ $cart->attributes->image }}" alt="{{ $cart->name }}"></a>
                                </figure>
                                <h2 class="product-name"><a href="{{ route('store.product.detail', [$cart->attributes->slug, $cart->attributes->sku]) }}">{{ $cart->name }}</a></h2>
                                <ul>
                                    {{-- <li>Color: White</li> --}}
                                    <li>Size: {{ $cart->attributes->size }}</li>
                                </ul>
                            </td>
                            <td class="product-code">{{ $cart->attributes->sku }}</td>
                            <td class="product-price-col">
                                <span class="product-price-special">
                                    
                                    @if ($cart->attributes->discount != 0 || $cart->attributes->discount != null)
                                        <del>N</del>{{ number_format($cart->attributes->discountedPrice, 2) }}
                                    @else
                                        <del>N</del>{{ number_format($cart->price, 2) }}
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="custom-quantity-input">
                                    <input type="text" name="quantity" value="{{ $cart->quantity }}">
                                </div>
                            </td>
                            <td class="product-total-col"><span class="product-price-special"><del>N</del>{{ number_format(Cart::get($cart->id)->getPriceSum(), 2) }}</span></td>
                            <td>
                                <a href="#" data-id="{{ $cart->id }}" class="close-button deleteOneItem"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="md-margin"></div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table total-table">
                            <tbody>
                                <tr>
                                    <td class="total-table-title">Items:</td>
                                    <td>{{ Cart::getTotalQuantity() }}</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">Subtotal:</td>
                                    <td><del>N</del>{{ number_format(Cart::getSubTotal(), 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="total-table-title">Shipping:</td>
                                    <td><del>N</del>500</td>
                                </tr>
                                {{-- <tr>
                                    <td class="total-table-title">TAX (0%):</td>
                                    <td>$0.00</td>
                                </tr> --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td><del>N</del>{{ number_format($data['cartTotal'], 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="md-margin"></div>
                        <div class="text-right"><a href="checkout.html" class="btn btn-custom-6 btn-lger min-width-sm">Checkout</a></div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="md-margin"></div>
                <h4><i class="glyphicon glyphicon-info-sign"></i>&nbsp;No item in your cart. <a href="{{ route('store.home') }}">Continue shopping</a></h4>
            </div>
            @endif
        </div>
    </div>
    <div class="lg-margin2x"></div>
@endsection

@section('main-scripts')
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
@endsection