    <!-- jQuery -->
    <script src="{{asset('frontend/js/jquery-1.11.min.js') }}"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Wocommerce JavaScript -->
    <script src="{{asset('frontend/js/woocommerce.js') }}"></script>
    <!-- scroll-page JavaScript -->
    <script src="{{asset('frontend/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <!-- menu-mobile JavaScript -->
    <script src="{{asset('frontend/js/menu-mobile.js') }}"></script>
    <!-- swiper JavaScript -->
    <script src="{{asset('frontend/js/swiper.min.js') }}"></script>
    <!-- main JavaScript -->
    <script src="{{asset('frontend/js/functions.js') }}"></script>

    <!-- revolution JavaScript -->
    <script src="{{asset('frontend/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script src="{{asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{asset('frontend/js/scripts-revolution.js') }}"></script>
    <script src="{{asset('frontend/js/moment.js') }}"></script>
    @stack('scripts')