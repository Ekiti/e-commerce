<meta charset="utf-8">
    <title>@yield('title') | Morade Stores - Online Fashion Store</title>
    <meta name="description" content="@yield('description')">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('store/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('store/css/revslider2.css') }}">
    <link rel="stylesheet" href="{{ asset('store/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('store/css/responsive.css') }}">
    <link rel="icon" type="image/png" href="images/icons/icon.html">
    <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.html">
    @yield('styles')
    <script src="{{ asset('store/js/jquery/jquery.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="store/js/jquery-2.1.1.min.js"><\/script>');
    </script>