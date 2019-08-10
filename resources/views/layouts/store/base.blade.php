<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('store/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('store/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('store/js/waypoints.js') }}"></script>
    <script src="{{ asset('store/js/waypoints-sticky.js') }}"></script>
    <script src="{{ asset('store/js/jquery.debouncedresize.js') }}"></script>
    <script src="{{ asset('store/js/retina.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.placeholder.js') }}"></script>
    <script src="{{ asset('store/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('store/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('store/js/twitter/jquery.tweet.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('store/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('store/js/maplabel.js') }}"></script>
    @yield('main-scripts')
    <script src="{{ asset('store/js/main.js') }}"></script>
    @yield('scripts')
    <script>
        $(function () {
            "use strict";
            jQuery("#revslider").revolution({
                delay: 8e3,
                startwidth: 1170,
                startheight: 600,
                fullWidth: "on",
                fullScreen: "off",
                hideTimerBar: "on",
                spinner: "spinner3"
            })
        });
    </script>