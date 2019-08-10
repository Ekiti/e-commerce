@extends('layouts.store.main')

@section('title', $data['product']->name)

@section('description', 'Shop for your fashion items online at Morade Stores')

@section('styles')
    <link rel="stylesheet" href="{{ asset('store/css/custom.css') }}">
@endsection

@section('content')
    <div id="product-single-container" class="light">
                <div class="breadcrumb-container absolute">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('store.home') }}" title="Home">Home</a></li>
                                    <li class="active">{{ $data['product']->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebg left"></div>
                <div class="sidebg middle visible-sm"></div>
                <div class="sidebg right"></div>
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-single-carousel">
                                @foreach ($data['product']->images as $image)
                                    <div class="slide"><img src="{{ $image->getImageSource() }}" alt="Product Image"
                                            class="img-responsive"></div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-margin2x visible-sm visible-xs"></div>
                <div class="product-single-meta-container">
                    <div class="container">
                        <div class="col-md-6 col-md-push-6 product-single-meta">
                            <h2 class="product-name">{{ $data['product']->name }}</h2>
                            <div class="clearfix">
                            @if ($data['product']->discout != null || $data['product']->discount |= 0)
                                <div class="product-price-container pull-left">
                                    <span class="product-old-price"><del>{{ $data['product']->currency() }}</del> {{ number_format($data['product']->price, 2) }}</span>
                                    <span class="product-price"><del>{{ $data['product']->currency() }}</del> {{ number_format($data['product']->discountedPrice(), 2) }}</span>
                                </div>
                            @else
                                <div class="product-price-container pull-left">
                                    <span class="product-price"><del>{{ $data['product']->currency() }}</del> {{ number_format($data['product']->price, 2) }}</span>
                                </div>
                            @endif
                            </div>
                            <div class="xs-margin"></div>
                            <ul>
                                <li><span>Availability:</span> {{ ($data['product']->quantity != 0) ? 'In Stock' : 'Out of Stock' }}</li>
                                <li><span>Product SKU:</span> {{ $data['product']->sku }}</li>
                                <li><span>Category:</span> {{ $data['product']->category->name . ', ' . $data['product']->subcategory->name }}</li>
                            </ul>
                            <p class="hidden-md">
                                {!! $data['product']->description !!}
                            </p>
                            <div class="filter-box"><span class="filter-label">Select Size</span>
                                <div class="row">
                                    @foreach ($data['product']->sizes as $size)
                                        <a href="javascript:void(0);" class="filter-size-box" data-size="{{ $size->name }}">{{ $size->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-action-container clearfix">
                                <div class="product-action-content clearfix">
                                    <input type="text" class="product-amount-input" value="1"> 
                                    <a href="#" title="Add to Cart" id="addToCartBtn" data-id="{{ $data['product']->id }}" data-slug="{{ $data['product']->slug }}" data-sku="{{ $data['product']->sku }}" data-name="{{ $data['product']->name }}" data-price="{{ ($data['product']->discount != null || $data['product']->discount != 0) ? $data['product']->discountedPrice() : $data['product']->price }}" data-discount="{{ $data['product']->discount }}" data-size="" data-discounted="{{ $data['product']->discountedPrice() }}" data-image="{{ $data['product']->images[0]->getImageSource() }}" class="btn btn-custom-6 min-width-md">Add to Cart</a>
                                </div>
                                <div class="product-action-inner">
                                    <a href="#" title="Wishlist" class="product-btn product-wishlist">Wishlist</a>
                                </div>
                            </div>
                            {{-- <div class="share-box"><span class="share-label">Share</span>
                                <ul class="social-links clearfix">
                                    <li>
                                        <a href="#" class="social-icon icon-facebook" title="Facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-twitter" title="Twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-linkedin" title="Linkedin"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-email" title="Email"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon icon-googleplus" title="Google +"></a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg-margin2x"></div>
            <div class="container">
                <div class="carousel-container">
                    <h2 class="carousel-title">Related</h2>
                    <div class="row">
                        <div class="owl-carousel new-arrivals-carousel">
                            @foreach ($data['relatedProducts'] as $product)
                                <div class="product product2">
                                    <div class="product-top">
                                        @if ($product->quantity === null || $product->quantity === 0)
                                            <span class="outofstock-box top-right">Out of <span>Stock</span></span>
                                        @else 
                                            @if ($product->discount != 0)
                                                <span class="discount-box top-left">-{{ $product->discount }}%</span>
                                            @else
                                                @if ($product->label != null && $product->label == 'new')
                                                    <span class="new-box top-left">{{ $product->label }}</span>
                                                @else
                                                    <span class="hot-box top-left">{{ $product->label }}</span>
                                                @endif
                                            @endif
                                        @endif
                                        <figure class="product-image-container">
                                            <a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}"><img src="{{ $product->images[0]->getImageSource() }}"
                                                    alt="{{ $product->name }}" class="product-image"> <img src="{{ $product->images[1]->getImageSource() }}"
                                                    alt="{{ $product->name }} hover" class="product-image-hover"></a>
                                        </figure>
                                    </div>
                                    
                                    @if ($product->discount != 0)
                                        <div class="product-price-container text-left">
                                            <span class="product-old-price"><del>{{ $product->currency() }}</del> {{ number_format($product->price, 2) }}</span>
                                            <span class="product-price"><del>{{ $product->currency() }}</del> {{ number_format($product->discountedPrice(), 2) }}</span>
                                        </div>
                                    @else
                                        <div class="product-price-container text-left">
                                            <span class="product-price"><del>{{ $product->currency() }}</del> {{ number_format($product->price, 2) }}</span>
                                        </div>
                                    @endif

                                    <h3 class="product-name text-left"><a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                                    <div class="product-action-container clearfix">
                                        <a href="#" title="{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}" class="product-add-btn">
                                            <span class="add-btn-text">{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}</span> 
                                            <span class="product-btn product-cart">Cart</span>
                                        </a>
                                        <div class="product-action-inner">
                                            <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                    </div>
                </div>
            </div>
            <div class="md-margin3x"></div>



            <div class="modal fade" tabindex="-1" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cart</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                        {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="cart-message-content"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="continueToCheckout" class="btn btn-custom-6 min-width-md">Continue to checkout</button>
                        <button type="button" class="btn btn-custom-5 min-width-md" data-dismiss="modal">Continue shopping</button>
                    </div>
                </div>
            </div>
            </div>



@endsection

@section('main-scripts')
    <script src="{{ asset('store/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.nouislider.min.js') }}"></script>
    <script src="{{ asset('store/js/shoppingcart.js') }}"></script>
@endsection