<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page Template</title>
    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap , fonts & icons  -->
    <link rel="stylesheet" href="{{ url('external/main.css') }}">
    <link rel="stylesheet" href="{{ url('external/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('external/fonts/icon-font/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('external/fonts/typography-font/typo.css') }}">
    <link rel="stylesheet" href="{{ url('external/fonts/typography-font/lucida-grande/typo.css') }}">
    <link rel="stylesheet" href="{{ url('external/fonts/fontawesome-5/css/all.css') }}">
    <!-- Plugin'stylesheets  -->
    <link rel="stylesheet" href="{{ url('external/plugins/aos/aos.min.css') }}">
    <link rel="stylesheet" href="{{ url('external/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ url('external/plugins/nice-select/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ url('external/plugins/slick/slick.min.css') }}">
    <!-- Vendor stylesheets  -->
    <link rel="stylesheet" href="{{ url('external/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('external/./plugins/theme-mode-switcher/switcher-panel.css') }}">
    <!-- Custom stylesheet -->
</head>

<body data-theme="light">
<div class="site-wrapper overflow-hidden">
    <!-- Header start  -->
    <!-- Header Area -->
    <header class="site-header l8-site-header site-header--menu-center dynamic-sticky-bg dark-mode-texts px-9 site-header--absolute site-header--sticky">
        <div class="container-fluid-fluid">
            <nav class="navbar site-navbar offcanvas-active navbar-expand-lg px-0">
                <!-- Brand Logo-->
                <div class="brand-logo d-inline-block">
                    <a href="index.html">
                        <!-- light version logo (logo must be black)-->
                        <img src="./image/png/logo-green-white.png" alt="">
                        <!-- Dark version logo (logo must be White)-->
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="mobile-menu">
                    <div class="navbar-nav-wrapper">
                        <ul class="navbar-nav main-menu">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle gr-toggle-arrow" id="navbarDropdown" href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos <i class="icon icon-small-down"></i></a>
                                <ul class="gr-menu-dropdown dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="drop-menu-item">
                                        <a href="#">
                                            Dropdown 01
                                        </a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="#">
                                            Dropdown 02
                                        </a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="#">
                                            Dropdown 03
                                        </a>
                                    </li>
                                    <li class="drop-menu-item">
                                        <a href="#">
                                            Dropdown 04
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://finestdevs.com/product-support/" role="button" aria-expanded="false">Support</a>
                            </li>
                        </ul>
                    </div>
                    <button class="d-block d-lg-none offcanvas-btn-close" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                        <i class="gr-cross-icon"></i>
                    </button>
                </div>
                <div class="header-btns ml-auto pr-2 ml-lg-9 d-none d-xs-flex">
                    <a class="btn btn-transparent-2 btn-small border-0 font-size-5 font-weight-normal text-periwinkle-gray focus-reset mr-6" href="#">
                        Login
                    </a>
                    <a class="btn btn-2 btn-turquoise border border-turquoise font-size-5 text-firefly" href="https://finestdevs.com/shade/">
                        Download Now
                    </a>
                </div>
                <!-- Mobile Menu Hamburger-->
                <button class="navbar-toggler btn-close-off-canvas  hamburger-icon border-0" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <i class="icon icon-simple-remove icon-close"></i> -->
                    <span class="hamburger hamburger--squeeze js-hamburger">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
            </span>
                </button>
                <!--/.Mobile Menu Hamburger Ends-->
            </nav>
        </div>
    </header>
    <!-- navbar- -->
    <!-- Header start end -->
    @yield('content')
    <!-- footer section -->
    <footer class="gradient-bg-6 position-relative l8-footer">
        <div class="shape l8-footer-shape-top-left">
            <img src="image/l8/svg/footer-shape.svg" alt="" class="w-100 light-shape default-shape z-index-n2">
        </div>
        <div class="container pt-lg-23 pt-15 pb-12">
            <div class="row justify-content-between" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                <div class="col col-cus-6">
                    <div class="footer-widget widget2 mb-md-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">Store</p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Catalog</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Popular</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Features</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">F.a.q.</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget3 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">About</p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Catalog</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Popular</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Features</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget4 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">Policy</p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Catalog</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Popular</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Features</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget4 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">Team</p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Catalog</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Popular</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Features</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
                <div class="col col-cus-6">
                    <div class="footer-widget widget4 mb-sm-0 mb-13">
                        <!-- footer widget title start -->
                        <p class="widget-title font-size-3 font-weight-normal text-periwinkle-gray mb-md-9 mb-7 font-family-inter">Support</p>
                        <!-- footer widget title end -->
                        <!-- widget social menu start -->
                        <ul class="widget-links pl-0 list-unstyled list-hover-primary">
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Catalog</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Popular</a></li>
                            <li class="mb-6"><a class="text-selago-3 font-size-5 font-weight-normal font-family-inter" href="">Features</a></li>
                        </ul>
                        <!-- widget social menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom start -->
        <div class="pt-6 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 px-0">
                        <div class="navbar site-navbar d-md-flex d-block text-center px-0">
                            <!-- DO NOT DELETE THIS CREDIT. TO DELETE, PLEASE BUY PRO LICENSE -->
                            <div class="copyright">
                                <p class="font-size-1 font-family-5 text-periwinkle-gray line-height-1p5 mb-0 font-family-inter"> &copy; Grayic 2020 All right reserved. </p>
                            </div>
                            <!-- copyright end-->
                            <!-- footer-menu start-->
                            <div class="footer-menu">
                                <!-- navbar-nav-wrapper start-->
                                <div class="navbar-nav-wrapper">
                                    <!-- main-menu start-->
                                    <ul class="mb-0 list-unstyled d-flex flex-row justify-content-center">
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="#features">Terms & Conditions</a>
                                        </li>
                                        <li class="mx-3">
                                            <a class="text-periwinkle-gray font-size-1 font-weight-normal font-family-inter" href="#features"> Site map</a>
                                        </li>
                                    </ul>
                                    <!-- main-menu end-->
                                </div>
                                <!-- navbar-nav-wrapper end-->
                            </div>
                            <!-- footer-menu end-->
                            <div class="ml-auto pr-2 ml-lg-12 ml-md-0">
                                <!-- widget social icon start -->
                                <div class="social-icons">
                                    <!-- widget social icon list start -->
                                    <ul class="pl-0 list-unstyled mb-lg-0 mb-0">
                                        <li class="d-inline-block px-3 ml-3"><a href="#" class="hover-color-primary text-white"><i class="fab fa-facebook-f font-size-3 pt-2"></i></a></li>
                                        <li class="d-inline-block px-3 ml-3"><a href="#" class="hover-color-primary text-white"><i class="fab fa-twitter font-size-3 pt-2"></i></a></li>
                                        <li class="d-inline-block px-3 ml-3"><a href="#" class="hover-color-primary text-white"><i class="fab fa-linkedin-in font-size-3 pt-2"></i></a></li>
                                    </ul>
                                    <!-- widget social icon list end -->
                                </div>
                                <!-- widget social icon end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- cta section -->
</div>
<!-- Vendor Scripts -->
<script src="{{ url('external/js/vendor.min.js') }}"></script>
<!-- Plugin's Scripts -->
<script src="{{ url('external/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('external/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('external/plugins/aos/aos.min.js') }}"></script>
<script src="{{ url('external/plugins/slick/slick.min.js') }}"></script>
<script src="{{ url('external/./plugins/counter-up/jquery.waypoints.js') }}"></script>
<script src="{{ url('external/./plugins/counter-up/jquery.counterup.js') }}"></script>
<script src="{{ url('external/plugins/theme-mode-switcher/gr-theme-mode-switcher.js') }}"></script>
<!-- Activation Script -->
<script src="{{ url('external/js/custom.js') }}"></script>
</body>

</html>
