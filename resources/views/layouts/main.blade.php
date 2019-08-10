<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#191d20" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('fav.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('./fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('./css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('./css/hotplatev2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('./css/master.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/fonts/feather/style.min.css') }}">

    <title>@yield('title') - {{$settings->name}}</title>
</head>
<body>
    @include('components.header')
    <!-- main content starts here -->
    <main class="flex column no-wrap col-lg-6 main-container">
    @yield('content')
    </main>
    <!-- main content ends here -->
    <!-- footer starts here -->
    @include('components.footer')
    <!-- footer ends here -->
    <script type="text/javascript" src="{{ URL::asset('./js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('./js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('./js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('./slick/slick.min.js') }}"></script>
    <script>
        $('.hero').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            arrows:true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
        @yield('main-scripts')
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131527350-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131527350-1');
</script>

</body>
</html>