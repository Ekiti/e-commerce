@extends('layouts.store.main')

@section('title', 'Home')

@section('description', 'Shop for your fashion items online at Morade Stores')

@section('content')
    <div id="revslider-container">
        <div id="revslider">
            <ul>
                <li data-transition="cube" data-slotamount="8" data-masterspeed="800" data-title="Trends"><img
                        src="{{ asset('store/images/revslider/dummy.png') }}" alt="slidebg1" data-lazyload="{{ asset('store/images/homesliders/index2/slide1.jpg') }}"
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <div class="tp-caption rev-subtitle customin customout" data-x="center" data-y="167"
                        data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1000" data-start="900" data-easing="Power3.easeInOut" data-endspeed="600"
                        style="z-index:10">choies trend 2014</div>
                    <div class="tp-caption rev-title customin customout" data-x="center" data-y="220"
                        data-speed="1100" data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-start="1300" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:6">platform
                        shoes</div>
                    <div class="tp-caption rev-text customin customout" data-x="center" data-y="292" data-speed="1200"
                        data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-start="1600" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:12">From sday to night, you'll be able to wear these gorgeous platform pumps on any occasion.</div>
                    <div class="tp-caption rev-btn customin customout" data-x="center" data-y="391"
                        data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1200" data-start="2200" data-easing="Power3.easeInOut" data-endspeed="600"
                        style="z-index:14"><a href="category.html" class="btn btn-custom-3 btn-lg min-width">Take
                            look</a></div>
                </li>
                <li data-transition="incube" data-slotamount="8" data-masterspeed="800" data-title="Season Sale"><img
                        src="{{ asset('store/images/revslider/dummy.png') }}" alt="slidebg1" data-lazyload="{{ asset('store/images/homesliders/index2/slide2.jpg') }}"
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <div class="tp-caption rev-subtitle lft ltt" data-x="176" data-y="165" data-speed="1000"
                        data-start="1000" data-easing="Back.easeInOut" data-endspeed="600" style="z-index:10">14/06/14
                        - 14/07/14</div>
                    <div class="tp-caption rev-title sfl stl" data-x="80" data-y="220" data-speed="1200"
                        data-start="1200" data-easing="Back.easeInOut" data-endspeed="600" style="z-index:8">MID
                        season sale</div>
                    <div class="tp-caption rev-text sfr str" data-x="45" data-y="295" data-speed="1200"
                        data-start="1600" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:12">Mauris commodo nisl eu odio luctus, sed iaculis orci tincidunt. Suspendisse vulputate luctus.</div>
                    <div class="tp-caption rev-btn lfb ltb" data-x="223" data-y="393" data-speed="1100"
                        data-start="1800" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:14"><a
                            href="category.html" class="btn btn-custom-3 btn-lg min-width">SHOP NOW</a></div>
                </li>
                <li data-transition="cube" data-slotamount="8" data-masterspeed="800" data-title="Stylish"><img
                        src="{{ asset('store/images/revslider/dummy.png') }}" alt="slidebg1" data-lazyload="{{ asset('store/images/homesliders/index2/slide3.jpg') }}"
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <div class="tp-caption rev-subtitle lft ltt" data-x="838" data-y="165" data-speed="1000"
                        data-start="1000" data-easing="Back.easeInOut" data-endspeed="600" style="z-index:10">STYLISH</div>
                    <div class="tp-caption rev-title sfl stl" data-x="697" data-y="220" data-speed="1200"
                        data-start="1200" data-easing="Back.easeInOut" data-endspeed="600" style="z-index:8">SUITS
                        &amp; COATS</div>
                    <div class="tp-caption rev-text short sfr str" data-x="625" data-y="295" data-speed="1200"
                        data-start="1600" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:12">Etiam interdum eu ante eget viverra. Sed consequat luctus sapien sed ultrices integer quis.</div>
                    <div class="tp-caption rev-btn lfb ltb" data-x="800" data-y="393" data-speed="1100"
                        data-start="1800" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:14"><a
                            href="category.html" class="btn btn-custom-3 btn-lg min-width">SHOP NOW</a></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner banner-sm text-right"><img src="{{ asset('store/images/banners/banner-sm.jpg') }}" alt="Banner 1">
                    <div class="banner-container">
                        <div class="vcenter-container">
                            <div class="vcenter">
                                <div class="banner-content text-uppercase">
                                    <h4>New Men</h4>
                                    <h3>COLLECTION</h3><a href="#" class="btn btn-custom-7 min-width-md">Buy it
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner banner-sm last text-right"><img src="{{ asset('store/images/banners/banner-sm2.jpg') }}" alt="Banner 2">
                    <div class="banner-container">
                        <div class="vcenter-container">
                            <div class="vcenter">
                                <div class="banner-content text-uppercase">
                                    <h4>Our hot</h4>
                                    <h3>New ARRIVALS</h3><a href="#" class="btn btn-custom-7 min-width-md">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="xlg-margin"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">New Arrivals</h2>
            <div class="row">
                <div class="owl-carousel new-arrivals-carousel">
                @foreach ($data['newArrivalRandomProducts'] as $product)
                    <div class="product product2">
                        <div class="product-top">
                            @if ($product->quantity === null || $product->quantity === 0)
                                <span class="outofstock-box top-right">Out of <span>Stock</span></span>
                            @else 
                                @if ($product->discount != 0)
                                    <span class="discount-box top-left">-{{ $product->discount }}%</span>
                                @else
                                    @if ($product->label != null)
                                        <span class="{{ ($product->label == 'new') ? 'new-box' : 'hot-box' }} top-left">{{ $product->label }}</span>
                                    @else
                                        
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
                        <div class="product-action-container clearfix"><a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}" class="product-add-btn"><span
                                    class="add-btn-text">{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}</span> <span class="product-btn product-cart">Cart</span></a>
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
    <div class="lg-margin3x xs-margin2x"></div>
    <div class="testimonials-section home parallax" data-stellar-background-ratio="0.4">
        <div class="container">
            <h2 class="h1">TESTIMONIALS</h2>
        </div>
        <div class="vcenter-container">
            <div class="vcenter bottom-nav">
                <div class="owl-carousel testimonials-slider">
                    <div class="testimonial"><span class="quote-icon"></span>
                        <p>Maecenas semper aliquam massa. Praesent pharetra sem vitae nisi eleifend molestie.
                            Aliquam molestie scelerisque ultricies. Suspendisse potenti. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Vivamus tempor dictum ornare. Maecenas
                            pellentesque nibh ac suscipit sodales.</p><span class="testimonial-owner">Anna
                            Retallick</span>
                    </div>
                    <div class="testimonial"><span class="quote-icon"></span>
                        <p>Phasellus eu ipsum vestibulum augue euismod ultrices. Donec mattis urna arcu,
                            convallis sodales augue vehicula in. Suspendisse tempus lacus augue, eu iaculis
                            ipsum pretium. Suspendisse potenti. Suspendisse potenti. Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit.</p><span class="testimonial-owner">Jake
                            Retallick</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin3x xs-margin2x"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">Bestsellers</h2>
            <div class="row">
                <div class="owl-carousel new-arrivals-carousel">
                @foreach ($data['newArrivalRandomProducts'] as $product)
                    <div class="product product2">
                        <div class="product-top">
                            @if ($product->quantity === null || $product->quantity === 0)
                                <span class="outofstock-box top-right">Out of <span>Stock</span></span>
                            @else 
                                @if ($product->discount != 0)
                                    <span class="discount-box top-left">-{{ $product->discount }}%</span>
                                @else
                                    @if ($product->label != null)
                                        <span class="{{ ($product->label == 'new') ? 'new-box' : 'hot-box' }} top-left">{{ $product->label }}</span>
                                    @else
                                        
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
                        <div class="product-action-container clearfix"><a href="{{ route('store.product.detail', [$product->slug, $product->sku]) }}" title="{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}" class="product-add-btn"><span
                                    class="add-btn-text">{{ ($product->quantity == 0) ? 'Preorder' : 'Add to cart' }}</span> <span class="product-btn product-cart">Cart</span></a>
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
    <div class="lg-margin3x xs-margin2x"></div>
    <div class="sm-margin visible-xs"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-delivery"></span>
                    <div class="feature-content">
                        <h3>Free Delivery</h3>
                        <p>Cras pellentesque, nisi ac tempus pellentesque, orci sem commodo urna, amet egestas
                            ipsum orci sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-service"></span>
                    <div class="feature-content">
                        <h3>24/h customer service</h3>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas praesent tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-box feature-box-inline clearfix"><span class="feature-icon icon-secured"></span>
                    <div class="feature-content">
                        <h3>payment secured</h3>
                        <p>Aenean porta adipiscing tortor, nec consequat nisi mollis sed. Aliquam orn are magna
                            sed leo varius, quis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="xlg-margin hidden-xs"></div>
    <div class="sm-margin visible-xs"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">From The blog</h2>
            <div class="row">
                <div class="owl-carousel blog-posts-carousel">
                    <article class="article">
                        <div class="article-media-container">
                            <a href="single.html"><img src="{{ asset('store/images/blog/post1.jpg') }}" class="img-responsive" alt="Post 1"></a>
                        </div>
                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span>
                            <span class="meta-box-text">05 Nov</span></div>
                        <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span>
                            <a href="#" class="meta-box-text">15 Com</a></div>
                        <h3><a href="single.html">Lorem ipsum dolor sit amet</a></h3>
                        <p>In quis malesuada mi, interdum sagittis est. Nunc a libero tristique, condimentum
                            velit eget, tristique sem. Nam auctor orci eget nunc condimentum sollicitudin.</p>
                    </article>
                    <article class="article">
                        <div class="article-media-container">
                            <a href="single.html"><img src="{{ asset('store/images/blog/post2.jpg') }}" class="img-responsive" alt="Post 2"></a>
                        </div>
                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span>
                            <span class="meta-box-text">12 Dec</span></div>
                        <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span>
                            <a href="#" class="meta-box-text">27 Com</a></div>
                        <h3><a href="single.html">Donec Ante Molestie In Dolor</a></h3>
                        <p>Maecenas sodales justo tortor, quis commodo libero pharetra nec. Nunc pretium mi ac
                            tellus porttitor auctor. Phasellus tincidunt porta diam, ut volutpat neque volutpat
                            sed.</p>
                    </article>
                    <article class="article">
                        <div class="article-media-container">
                            <a href="single.html"><img src="{{ asset('store/images/blog/post3.jpg') }}" class="img-responsive" alt="Post 3"></a>
                        </div>
                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span>
                            <span class="meta-box-text">18 Nov</span></div>
                        <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span>
                            <a href="#" class="meta-box-text">11 Com</a></div>
                        <h3><a href="single.html">Lorem ipsum dolor sit amet</a></h3>
                        <p>Vivamus mollis varius metus in egestas. Vestibulum blandit auctor dolor. Praesent
                            iaculis ultrices accumsan. Integer sollicitu din consectetur lectus, vitae
                            vulputate velit.</p>
                    </article>
                    <article class="article">
                        <div class="article-media-container">
                            <a href="single.html"><img src="{{ asset('store/images/blog/post4.jpg') }}" class="img-responsive" alt="Post 4"></a>
                        </div>
                        <div class="article-meta-box"><span class="article-icon article-date-icon"></span>
                            <span class="meta-box-text">03 Nov</span></div>
                        <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span>
                            <a href="#" class="meta-box-text">18 Com</a></div>
                        <h3><a href="single.html">Lorem ipsum dolor sit amet</a></h3>
                        <p>In quis malesuada mi, interdum sagittis est. Nunc a libero tristique, condimentum
                            velit eget, tristique sem. Nam auctor orci eget nunc condimentum sollicitudin.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <div class="lg-margin2x hidden-xs"></div>
    <div class="xlg-margin visible-xs"></div>
    <div class="container">
        <div class="carousel-container">
            <h2 class="carousel-title">Our Brands</h2>
            <div class="row">
                <div class="owl-carousel brands-carousel">
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                    <div class="brand">
                        <a href="#"><img src="{{ asset('store/images/brands/brand.jpg') }}" alt="Brand name"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md-margin2x half hidden-xs"></div>
    <div class="lg-margin visible-xs"></div>
@endsection