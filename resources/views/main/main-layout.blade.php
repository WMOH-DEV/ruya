<!DOCTYPE html>
<html class="no-js" lang='ar'>

<x-header-codes />

<body>
<!-- header-start -->
<header class="header-transparent">
    <div id="sticky-header" class="main-menu-area menu-padding">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-2 col-lg-7 col-md-6 col-8">
                    <div class="logo" id="logoID">
                        <a href="{{url('/')}}"
                        ><img src="{{asset('main')}}/assets/img/logo/logo.png" alt=""
                            /></a>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                    <div class="main-menu text-left ml-15">
                        <!-- Right Navbar -->
                        @include('main.layouts.main-nav')
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-2">
                    <div
                        class="header-right d-sm-flex align-items-center justify-content-end"
                    >
                        <!-- Left Navbar -->
                        @include('main.layouts.left-nav')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>

    <!-- offset-sidebar start -->
    <x-sidebar-nav></x-sidebar-nav>
    <!-- offset-sidebar end -->

    <!-- side-mobile-menu start -->
    @include('main.layouts.mobile-nav')
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>
<!-- slide-bar end -->

<main>

    @yield('content')


    <!-- footer-area-start -->
    <x-main-footer></x-main-footer>
    <!-- footer-area-end -->
</main>

<!-- JS here -->
<script src="{{asset('main')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('main')}}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="{{asset('main')}}/assets/js/popper.min.js"></script>
<!--    <script src="{{asset('main')}}/assets/js/bootstrap.min.js"></script>-->
<script src="{{asset('main')}}/assets/js/bootstrap.rtl.bundle.min.js"></script>
<script src="{{asset('main')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('main')}}/assets/js/isotope.pkgd.min.js"></script>
<script src="{{asset('main')}}/assets/js/slick.min.js"></script>
<script src="{{asset('main')}}/assets/js/metisMenu.min.js"></script>
<script src="{{asset('main')}}/assets/js/jquery.meanmenu.min.js"></script>
<script src="{{asset('main')}}/assets/js/ajax-form.js"></script>
<script src="{{asset('main')}}/assets/js/wow.min.js"></script>
<script src="{{asset('main')}}/assets/js/waypoints.min.js"></script>
<script src="{{asset('main')}}/assets/js/jquery.counterup.min.js"></script>
<script src="{{asset('main')}}/assets/js/jquery.scrollUp.min.js"></script>
<script src="{{asset('main')}}/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('main')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('main')}}/assets/js/jquery.nice-select.js"></script>
{{--<script src="{{asset('main')}}/assets/js/jquery.nice-select-with-search-multiple.js"></script>--}}
<script src="{{asset('main')}}/assets/js/jquery.easypiechart.js"></script>
<script src="{{asset('main')}}/assets/js/alerts.min.js"></script>
<script src="{{asset('main')}}/assets/js/cookieconsent.min.js" data-cfasync="false"></script>
<script src="{{asset('main')}}/assets/js/main.js"></script>
@yield('script')
<script src="{{asset('main')}}/assets/js/app.js"></script>
</body>
@flasher_render
</html>
