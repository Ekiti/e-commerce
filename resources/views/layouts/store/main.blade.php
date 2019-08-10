<!DOCTYPE html>
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if !IE]><!-->
<html>
<!--<![endif]-->

<head>
    @include('layouts.store.head')
</head>

<body>
    <div id="wrapper">
        <div id="sticky-header" class="fullwidth-menu header2" data-fixed="fixed"></div>
        <header id="header" class="fullwidth-menu header2">
            <div id="header-top">
                @include('layouts.store.header-top')
            </div>
            <div class="container" data-clone="sticky">
                @include('layouts.store.nav')
            </div>
        </header>

        <main id="content" role="main">
            @yield('content')
        </main>

        <footer id="footer" class="footer3">
            @include('layouts.store.footer')
        </footer>
    </div><a href="#header" id="scroll-top" title="Go to top">Top</a>

    @include('layouts.store.base')
</body>
</html>