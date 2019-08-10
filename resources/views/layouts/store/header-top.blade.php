<div class="container clearfix">
        <div class="left-side">
            <ul class="header-links">
                <li><a href="#"><span class="header-links-icon icon-account"></span><span>My Account</span></a></li>
                <li><a href="checkout.html"><span class="header-links-icon icon-checkout"></span><span>Checkout</span></a></li>
                <li><a href="#"><span class="header-links-icon icon-wishlist"></span><span>My Wishlist</span></a></li>
                <li>
                    @auth
                        <a href="{{ route('store.logout') }}"><span class="header-links-icon icon-login"></span><span>Logout</span></a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}"><span class="header-links-icon icon-login"></span><span>Login</span></a>
                    @endguest
                </li>
            </ul>
            <div class="user-dropdown dropdown visible-sm visible-xs"><a title="My Account" class="dropdown-toggle"
                    data-toggle="dropdown"><span class="header-links-icon icon-account"></span><span class="user-text">My
                        Account</span><span class="dropdown-arrow"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="header-links-icon icon-account"></span><span>My Account</span></a></li>
                    <li><a href="checkout.html"><span class="header-links-icon icon-checkout"></span><span>Checkout</span></a></li>
                    <li><a href="#"><span class="header-links-icon icon-wishlist"></span><span>My Wishlist</span></a></li>
                    <li><a href="{{ route('login') }}"><span class="header-links-icon icon-login"></span><span>Login</span></a></li>
                </ul>
            </div>
        </div>
        <div class="right-side">
            <div class="search-container">
                <form action="{{ route('store.search.results') }}" method="GET" class="search-form">
                    <input type="search" name="q" class="s" placeholder="Search entry site here...">
                    <a href="#" title="Close Search" class="search-close-btn"></a>
                    <input type="submit" value="Submit" class="search-submit-btn">
                </form>
            </div><a href="#" class="header-search-btn" title="Search"><span class="hidden-sm hidden-xs">Search</span></a>
            <div class="cart-dropdown dropdown pull-right"><a href="{{ route('store.cart') }}" title="Shopping Cart" class="dropdown-toggle cart-link"
                    data-toggle="dropdown"><span class="dropdown-icon"></span><span class="badge cart-counter">{{ Cart::getTotalQuantity() }}</span><span
                        class="hidden-sm hidden-xs"><span class="cart-counter">{{ Cart::getTotalQuantity() }}</span> item(s)</span></a>
                {{-- <div class="dropdown-menu">
                    <div class="cart-dropdown-header"><span class="dropdown-icon"></span>2 item(s) -
                        $665.00</div>
                    <p class="cart-desc">2 item(s) in your cart - $658.00</p>
                    <div class="product clearfix">
                        <a href="#" class="delete-btn" title="Delete Product"></a>
                        <figure class="product-image-container">
                            <a href="product.html" title="Mustard yellow ruffle dress"><img src="{{ asset('store/images/products/product9.jpg') }}"
                                    alt="Product image" class="product-image"></a>
                        </figure>
                        <div class="product-content">
                            <h3 class="product-name"><a href="product.html" title="Mustard yellow ruffle dress">Mustard
                                    yellow ruffle dress</a></h3>
                            <div class="product-price-container"><span class="product-price">$478.00</span></div>
                        </div>
                    </div>
                    <div class="product clearfix">
                        <a href="#" class="delete-btn" title="Delete Product"></a>
                        <figure class="product-image-container">
                            <a href="product.html" title="Navy Blue Silk Pleated Shift Dress"><img src="{{ asset('store/images/products/product2.jpg') }}"
                                    alt="Product image" class="product-image"></a>
                        </figure>
                        <div class="product-content">
                            <h3 class="product-name"><a href="product.html" title="Navy Blue Silk Pleated Shift Dress">Navy
                                    Blue Silk Pleated Shift Dress</a></h3>
                            <div class="product-price-container"><span class="product-old-price">$250.00</span>
                                <span class="product-price">$180.00</span></div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <ul class="pull-left action-info-container">
                            <li>Shipping: <span class="first-color">$7.00</span></li>
                            <li>Tax: <span class="text-lowercase">free</span></li>
                            <li>Total: <span class="first-color">$665.00</span></li>
                        </ul>
                        <ul class="pull-right action-btn-container">
                            <li><a href="cart.html" class="btn btn-custom-5">Cart</a></li>
                            <li><a href="cart.html" class="btn btn-custom">Checkout</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="currency-dropdown dropdown"><a title="Laundary" class="dropdown-toggle" data-toggle="dropdown"><span
                        class="long-name">Laundary</span><span class="short-name">Laundary</span></a>
                {{-- <ul class="dropdown-menu">
                    <li><a href="#"><span class="long-name">US Dollar</span><span class="short-name">USD</span></a></li>
                </ul> --}}
            </div>
            {{-- <div class="currency-dropdown dropdown"><a title="Currency" class="dropdown-toggle" data-toggle="dropdown"><span
                        class="long-name">Naira (NGN)</span><span class="short-name">NGN</span><span class="dropdown-arrow"></span></a> --}}
                {{-- <ul class="dropdown-menu">
                    <li><a href="#"><span class="long-name">US Dollar</span><span class="short-name">USD</span></a></li>
                </ul> --}}
            {{-- </div> --}}
            
            {{-- <div class="language-dropdown dropdown"><a title="Language" class="dropdown-toggle" data-toggle="dropdown"><span
                        class="long-name">English</span><span class="short-name">Eng</span><span class="dropdown-arrow"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="long-name">English</span><span class="short-name">Eng</span><img
                                src="{{ asset('store/images/flags/england.jpg') }}" alt="English"></a></li>
                    <li><a href="#"><span class="long-name">Spanish</span><span class="short-name">Spa</span>
                            <img src="{{ asset('store/images/flags/spain.jpg') }}" alt="Spanish"></a></li>
                    <li><a href="#"><span class="long-name">French</span><span class="short-name">Fre</span>
                            <img src="{{ asset('store/images/flags/france.jpg') }}" alt="French"></a></li>
                    <li><a href="#"><span class="long-name">German</span><span class="short-name">Ger</span>
                            <img src="{{ asset('store/images/flags/germany.jpg') }}" alt="German"></a></li>
                    <li><a href="#"><span class="long-name">Italian</span><span class="short-name">Ita</span>
                            <img src="{{ asset('store/images/flags/italy.jpg') }}" alt="Italian"></a></li>
                </ul>
            </div> --}}
        </div>
    </div>