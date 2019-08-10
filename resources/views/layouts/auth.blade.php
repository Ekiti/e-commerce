<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('./css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('./css/hotplatev2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('./css/master.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./slick/slick-theme.css') }}"/>
    <title>{{$settings->name}}</title>
</head>
<body>
    <!-- main content starts here -->
    <main class="flex column center middle no-wrap col-lg-6 100vh">
    @yield('content')
    </main>
    <!-- main content ends here -->
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
            arrows:true
        });
    </script>
</body>
</html>