<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') . ' - ' . $page = 'Homepage' . ' | ' . ($saas->sentence ?? '') }}</title>
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
    <style>
        html {
            scroll-behavior: smooth !important;
        }
    </style>
    <!-- Crisp Chat -->
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="708a26c9-331b-4309-a2d2-2dbe78fbc252";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <!-- Livewire Style -->
    @livewireStyles
</head>

<body data-theme="light">
<div class="site-wrapper overflow-hidden">
    <!-- Header start  -->
    <!-- Header Area -->
    <header class="l8-site-header site-header--menu-center dynamic-sticky-bg dark-mode-texts px-9 site-header--absolute site-header--sticky">
        <div class="container-fluid-fluid">
            <nav class="navbar site-navbar offcanvas-active navbar-expand-lg px-0">
                <!-- Brand Logo-->
                <div class="brand-logo d-inline-block">
                    <a href="{{ route('homepage') }}">
                        <!-- light version logo (logo must be black)-->
                        {!! makeLogo('dark', [50, '']) !!}
                        <!-- Dark version logo (logo must be White)-->
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="mobile-menu">
                    <div class="navbar-nav-wrapper">
                        <ul class="navbar-nav main-menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ makeLink('top') }}">{{ __('external.Homepage') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ makeLink('features') }}">{{ __('external.Features') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{  makeLink('details') }}">{{ __('external.Details') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{  makeLink('pricing') }}">{{ __('external.Pricing') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{  makeLink('testimonials') }}">{{ __('external.Testimonials') }}</a>
                            </li>
                        </ul>
                    </div>
                    <button class="d-block d-lg-none offcanvas-btn-close" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                        <i class="gr-cross-icon"></i>
                    </button>
                </div>
                <div class="header-btns ml-auto pr-2 ml-lg-9 d-none d-xs-flex">
                    <div class="dropdown show">
                        <a class="btn btn-transparent-2 btn-small border-0 font-size-5 font-weight-normal text-periwinkle-gray focus-reset mr-6" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-language"></i>
                        </a>
                        <form method="POST" onchange="this.submit()" action="{{ route('language.change') }}" class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                            @csrf
                            {{ app()->getLocale() }}
                            <label class="custom-control custom-radio">
                                <input @if(app()->getLocale() == 'fr') checked=""  @endif value="fr" type="radio" name="lang" class="custom-control-input"><span class="custom-control-label"><img class="img-fluid rounded" style="height: 20px" src="https://www.makacla.com/photo/art/grande/6771020-10350548.jpg?v=1404162660"></span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input @if(app()->getLocale() == 'en') checked=""  @endif value="en" type="radio" name="lang" class="custom-control-input"><span class="custom-control-label"><img class="img-fluid rounded" style="height: 20px" src="https://www.ismac.fr/wp-content/uploads/2017/09/drapeau-anglais.png"></span>
                            </label>
                        </form>
                    </div>
                    @guest
                        <a class="btn btn-transparent-2 btn-small border-0 font-size-5 font-weight-normal text-periwinkle-gray focus-reset mr-6" href="{{ route('login') }}">
                            {{ __('auth.Login') }}
                        </a>
                        <a class="btn btn-2 btn-turquoise border border-turquoise font-size-5 text-firefly" href="{{ route('project.create') }}">
                            {{ __('external.Try it now') }}
                        </a>
                    @endguest
                    @auth
                        <a class="btn btn-light py-3" href="{{ route('projects.manage') }}">
                            {{ __('project.Manage projects') }} >
                        </a>
                    @endauth
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
        {{-- @include('external.footer') --}}
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
<!-- Livewire Script -->
@livewireScripts
</body>

</html>
