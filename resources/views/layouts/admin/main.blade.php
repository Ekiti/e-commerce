<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    @include('layouts.admin.header')
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
      @include('layouts.admin.nav')
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      @include('layouts.admin.menu')
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">

            @yield('content-header-left')

            @yield('content-header-right')

        </div>
        <div class="content-body"><!-- eCommerce statistic -->
            @yield('content')
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    {{-- <div class="buy-now"><a href="https://goo.gl/3ossgu" target="_blank" class="btn bg-gradient-directional-purple round white btn-purple btn-glow px-2">Buy Now</a></div> --}}

    @include('layouts.admin.footer')

    @include('layouts.admin.base')
  </body>
</html>