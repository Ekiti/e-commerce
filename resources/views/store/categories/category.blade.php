@extends('layouts.store.main')

@section('title', $data['category']->name)

@section('description', 'Shop for your fashion items in our ' . $data['category']->name . ' category online at Morade Stores')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('store.home') }}" title="Home">Home</a></li>
                        <li class="active">{{ $data['category']->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="lg-margin"></div>
                <div class="row">
                    <div class="col-md-9 padding-right-lg">
                        <div class="category-grid">
                        @if ($data['products']->count() != 0)
                        @foreach ($data['chunks'] as $chunk)
                            <div class="row">
                            @foreach ($chunk as $product)
                                <div class="col-sm-4 md-margin2x">
                                    <div class="product">
                                        <div class="product-top">
                                            @if ($product->quantity === null || $product->quantity === 0)
                                                <span class="outofstock-box top-right">Out of <span>Stock</span></span>
                                            @else 
                                                @if ($product->discount != 0)
                                                    <span class="discount-box top-left">-{{ $product->discount }}%</span>
                                                @else
                                                    @if ($product->label)
                                                        <span class="{{ $product->label != 'new' ? 'new-box' : 'hot-box' }} top-left">{{ $product->label }}</span>
                                                    @else
                                                    @endif
                                                @endif
                                            @endif

                                            <figure class="product-image-container">
                                                <a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}"><img src="{{ $product->images[0]->getImageSource() }}"
                                                        alt="{{ $product->name }}" class="product-image"> <img src="{{ $product->images[1]->getImageSource() }}"
                                                        alt="{{ $product->name }} hover" class="product-image-hover"></a>
                                            </figure>

                                            <div class="product-action-container">
                                                <div class="product-action-wrapper action-responsive">
                                                <a href="#" title="{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}" class="product-add-btn"><span class="add-btn-text">{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }} </span> <span class="product-btn product-cart">Cart</span></a>
                                                    {{-- <a href="#" title="Search" class="product-btn product-search">Search</a> --}}
                                                    <a href="#" title="Favorite" class="product-btn product-favorite">Favorite</a>
                                                    {{-- <a href="#" title="Compare" class="product-btn product-compare">Compare</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="product-name text-left"><a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                                        
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

                                        </div>
                                </div>
                            @endforeach
                            </div>
                            @endforeach
                            @else
                                <h4><i class="glyphicon glyphicon-info-sign"></i>&nbsp;No product in this category.</h4>
                            @endif
                            <div class="pagination-container clear-margin clearfix">
                                    {{-- <span class="pagination-info">Items
                                    1 to 18 of 120 total</span> --}}
                                {{-- <ul class="pagination pull-right">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a class="next-page" href="#">Next</a></li>
                                </ul> --}}
                                {{ $data['products']->links() }}
                            </div>
                        </div>
                        <div class="md-margin2x visible-sm visible-xs"></div>
                    </div>
                    <aside class="col-md-3 sidebar margin-top-up" role="complementary">
                        <div class="widget">
                            <h3>Categories</h3>
                            <ul id="category-widget">
                            @foreach ($data['grouped'] as $index => $subcategories)
                                <li class=""><a href="{{ route('store.category.index', $data['grouped'][$index][0]->category->slug) }}">{{ $data['grouped'][$index][0]->category->name }} <span class="category-widget-btn"></span></a>
                                    <ul>
                                    @foreach ($subcategories as $subcategory)
                                        <li><a href="{{ route('store.subcategory.index', [$subcategory->category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x hidden-xs"></div>
    <div class="md-margin2x visible-xs"></div>
@endsection

@section('main-scripts')
    <script src="{{ asset('store/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.nouislider.min.js') }}"></script>
@endsection