<!-- BEGIN VENDOR JS-->
    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin/app-assets/vendors/js/charts/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/timeline/horizontal-timeline.js') }}"></script>
    @yield('vendor-scripts')
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <!-- BEGIN CUSTOM JS-->
    <script src="{{ asset('admin/app-assets/js/custom/menu.js') }}"></script>
    @yield('scripts')
    <!-- END PAGE LEVEL JS-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131527350-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131527350-1');
</script>
