<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ url('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/vector-map/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles

    <!-- Toastr Css !-->
    @toastr_css

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Data tables Css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- Page infos -->
    @php
        $page = $page ?? __('Dashboard');
        $breadcumbs = $breadcumbs ?? [$page => route('home', $prefix ?? session()->get('prefix'))];
        $route = \Request::route()->getName();
    @endphp
    <!-- / Page infos -->
    <title>{{ $website->name ?? 'Gym CRM' . ' - ' . $page }}</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include('partials.navbar')
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link @if($route === "home") active @endif()" href="{{ route('home', $prefix) }}"><i class="fa fa-fw fa-user-circle"></i>{{ __('Dashboard') }} <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link @if(Str::startsWith($route, 'members')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#members_menu" aria-controls="submenu-1"><i class="fa fa-users"></i>{{ __('pages.Members') }}</a>
                            <div id="members_menu" class="submenu collapse @if(Str::startsWith($route, 'members')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'members.index')) active @endif()" href="{{ route('members.index', $prefix) }}">{{ __('members.All members') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'members.create')) active @endif()" href="{{ route('members.create', $prefix) }}">{{ __('members.Add a member') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link @if(Str::startsWith($route, 'features') or Str::startsWith($route, 'subscriptions')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-money-check"></i>{{ __('Plans') }}</a>
                            <div id="submenu-2" class="collapse submenu @if(Str::startsWith($route, 'features') or Str::startsWith($route, 'subscriptions')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed @if(Str::startsWith($route, 'features')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#features_menu" aria-controls="features_menu">{{ __('Features') }}</a>
                                        <div id="features_menu" class="submenu collapse @if(Str::startsWith($route, 'features')) show @endif()" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'features.index')) active @endif()" href="{{ route('features.index', $prefix) }}">{{ __('All features') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'features.create')) active @endif()" href="{{ route('features.create', $prefix) }}">{{ __('Add features') }}</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <a class="nav-link collapsed @if(Str::startsWith($route, 'subscriptions')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#subscriptions_menu" aria-controls="subscriptions_menu">{{ __('Subscriptions') }}</a>
                                        <div id="subscriptions_menu" class="submenu collapse @if(Str::startsWith($route, 'subscriptions')) show @endif()" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'subscriptions.index')) active @endif()" href="{{ route('subscriptions.index', $prefix) }}">{{ __('All subscriptions') }}</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'subscriptions.create')) active @endif()" href="{{ route('subscriptions.create', $prefix) }}">{{ __('Add subscription') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Str::startsWith($route, 'user.settings.show')) active @endif()" href="{{ route('user.settings.show', $prefix) }}"><i class="fa fa-user-cog"></i>{{ __('general.Settings') }} <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Chart</a>
                            <div id="submenu-3" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-c3.html">C3 Charts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-chartist.html">Chartist Charts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-charts.html">Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-morris.html">Morris</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-sparkline.html">Sparkline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/chart-gauge.html">Guage</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                            <div id="submenu-4" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/form-elements.html">Form Elements</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/multiselect.html">Multiselect</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/datepicker.html">Date Picker</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/bootstrap-select.html">Bootstrap Select</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tables</a>
                            <div id="submenu-5" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/general-table.html">General Tables</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/data-tables.html">Data Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-divider">
                            Features
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                            <div id="submenu-6" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/login.html">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/404-page.html">404 page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/timeline.html">Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/calendar.html">Calendar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/widgets.html">Widgets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/media-object.html">Media Objects</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Apps <span class="badge badge-secondary">New</span></a>
                            <div id="submenu-7" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/inbox.html">Inbox</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/email-details.html">Email Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/email-compose.html">Email Compose</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/message-chat.html">Message Chat</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Icons</a>
                            <div id="submenu-8" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-fontawesome.html">FontAwesome Icons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-material.html">Material Icons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-simple-lineicon.html">Simpleline Icon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-themify.html">Themify Icon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-flag.html">Flag Icons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/icon-weather.html">Weather Icon</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                            <div id="submenu-9" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/map-google.html">Google Maps</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/map-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                            <div id="submenu-10" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Level 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                        <div id="submenu-11" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Level 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Level 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Level 3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pagehader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="mb-2">{{ $page }} </h3>
                        <p class="pageheader-text">Lorem ipsum dolor sit ametllam fermentum ipsum eu porta consectetur adipiscing elit.Nullam vehicula nulla ut egestas rhoncus.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach($breadcumbs as $key => $value)
                                        <li class="breadcrumb-item"><a href="{{ $value }}" class="breadcrumb-link">{{ $key }}</a></li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            @include('partials.session')
            <!-- pagehader  -->
            <!-- ============================================================== -->
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 js-->
<script src="{{ url('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<!-- bootstrap bundle js-->
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- slimscroll js-->
<script src="{{ url('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- chartjs js-->
<script src="{{ url('assets/vendor/charts/charts-bundle/Chart.bundle.js') }}"></script>
<script src="{{ url('assets/vendor/charts/charts-bundle/chartjs.js') }}"></script>

<!-- Livewire -->
@livewireScripts
<!-- Toastr Js -->
@jquery
@toastr_js
@toastr_render
<!-- main js-->
<script src="{{ url('js/main.js') }}"></script>

<script src="{{ url('assets/libs/js/main-js.js') }}"></script>

<!-- jvactormap js-->
<script src="{{ url('assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ url('assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- sparkline js-->
<script src="{{ url('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ url('assets/vendor/charts/sparkline/spark-js.js') }}"></script>

<!-- dashboard sales js-->
<script src="{{ url('assets/libs/js/dashboard-sales.js') }}"></script>

<!-- Data tables Js -->
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>

@yield('scripts')

</body>

</html>
