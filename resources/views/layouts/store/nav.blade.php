<div class="row">
    <div class="col-md-4">
        <ul class="menu left-menu clearfix">
            <li><a href="{{ route('store.home') }}">Home</a>
            </li>
            <li class="megamenu-container"><a href="#">Shop</a>
                <div class="megamenu">
                    <div class="container">
                        <div class="row">
                        @foreach ($data['grouped'] as $index => $subcategories)
                            <div class="col-md-2"><a href="{{ route('store.category.index', $data['grouped'][$index][0]->category->slug) }}" class="megamenu-title">{{ $data['grouped'][$index][0]->category->name }}</a>
                                <ul>
                                    @foreach ($subcategories as $subcategory)
                                        <li><a href="{{ route('store.subcategory.index', [$subcategory->category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                            <div class="col-md-4 menu-banner">
                                <a href="#" class="banner text-left"><img src="{{ asset('store/images/banners/megamenu-banner.jpg') }}"
                                        alt="Banner">
                                    <div class="banner-container text-center text-uppercase">
                                        <h5>Stylish</h5>
                                        <h4>Men Suits</h4>
                                        <h5>starting at <span>$150</span></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-md-4 logo-container">
        <h1 class="logo clearfix"><a href="{{ route('store.home') }}" title="Morade Stores - Online Fashion Store">MORADE STORES</a></h1>
    </div>
    <div class="col-md-4 clearfix">
        <nav>
            <div id="responsive-nav"><a id="responsive-btn" href="#"><span class="responsive-btn-icon"><span
                            class="responsive-btn-block"></span> <span class="responsive-btn-block"></span>
                        <span class="responsive-btn-block last"></span></span> <span class="responsive-btn-text visible-sm-inline-block visible-xs-inline-block">Menu</span></a>
                <div id="responsive-menu-container"></div>
            </div>
            <ul class="menu right-menu clearfix">
                <li><a href="blog.html">Blog</a>
                </li>
                <li class="reverse"><a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>