<!-- header starts here -->
<header class="flex column no-wrap col-lg-6">
    <section class="flex column middle space-between col-lg-6 header-1">
        <div class="flex middle space-between col-lg-6 header-3">
        
            <div class="logo">
                <a href="{{route('user.index')}}">
                    <img src="{{ URL::asset('./images/logobw.svg') }}" alt="shoeMaka">
                </a>
            </div>
            <div class="flex center middle show-for-desktop">
                {!! Form::open(array('route' => 'query.search', 'method'=>"GET", 'class'=>'flex center middle form-search')) !!}
                    {!! Form::text('search', null,
                                        array('required',
                                                'class'=>'form-search-input',
                                                'placeholder'=>'search for shoes')) !!}
                    <button name="sumbmit" class="form-search-btn" type="submit">
                        <i class="ion-search"></i>        
                    </button>
                {!! Form::close() !!}
            </div>
            <div class="flex center middle icon-set">
                @if(Auth::user())
                <a class="flex middle" href=" {{ route('profile.index') }} "> <i class="ion-ios-contact"></i> {{Auth::user()->name}} </a>
                @else
                <a href="/login">Login</a>
                @endif
                <a id="" href="{{route('store.cart')}}" class="has-cart"><i class="ion-ios-cart"></i>
                    <div class="flex center middle the-cart cart-number">
                    @if(Cart::getTotalQuantity() >= 1 )
                        {{ count(Cart::getContent()) }}
                    @else
                        {{ __('0') }}
                    @endif
                    </div>
                </a>       
                <a id="mobile-nav" href="#"><i class="ion-ios-menu"></i> </a>
            </div>
        </div>
        <div class="flex center middle col-lg-6 show-for-mobile">
            {!! Form::open(array('route' => 'query.search', 'method'=>"GET", 'class'=>'flex center middle form-search')) !!}
                {!! Form::text('search', null,
                                    array('required',
                                            'class'=>'form-search-input',
                                            'placeholder'=>'search for shoes')) !!}
                <button name="sumbmit" class="form-search-btn" type="submit">
                    <i class="ion-search"></i>        
                </button>
            {!! Form::close() !!}
        </div>
    </section>
    <section class="flex col-lg-6 header-2">
        <!-- this is the navigation and social icons section -->
        <nav class="menu">
            <ul class="menu-ul">
            <li><a href="#">Men</a>
                    <ul>
                        <li><a href="{{__('/category/men/shoes') }}">Shoes</a></li>
                        <li><a href="{{__('/category/men/watches') }}">Watches</a></li>
                        <li><a href="{{__('/category/men/accessories') }}">Accessories</a></li>
                    </ul>
                </li>
                <li><a href="#">Women</a>
                    <ul>
                        <li><a href="{{__('/category/women/shoes') }}">Shoes</a></li>
                        <li><a href="{{__('/category/women/bags') }}">Bags</a></li>
                        <li><a href="{{__('/category/women/accessories') }}">Accessories</a></li>
                    </ul>
                </li>
                <li><a href="#">My shoemaka</a>
                    <ul>
                        @foreach($vendors as $vendor)
                        <li><a href="{{__('/category/men') }}">{{$vendor->vendor_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
    </nav>
        </nav>
    </section>
</header>
<!-- header ends here -->
