<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/vector-map/jqvmap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script>
        window.onload = () => {
            'use strict';

            if ('serviceWorker' in navigator) {
                navigator.serviceWorker
                    .register('{{ url('sw.js') }}');
            }
        }
    </script>

    <!-- Livewire -->
    @livewireStyles

    <!-- Toastr Css !-->
    @toastr_css

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Data tables Css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    @yield('styles')

    <!-- Bootstrap-select Css -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap-select/css/bootstrap-select.css') }}">

    <!-- Page infos -->
    @php
        $page = $page ?? __('Dashboard');
        $breadcumbs = $breadcumbs ?? [$page => route('home', $prefix ?? session()->get('prefix'))];
        $route = \Request::route()->getName();
    @endphp
    <!-- / Page infos -->

    <!-- Phone Input CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('images/icon-512x512.png') }}">
    <link rel="apple-touch-icon" type="image/png" href="{{ url('images/icon-512x512.png') }}">
    <link rel="msapplication-TileImage" content="{{ url('images/icon-512x512.png') }}">

    <!-- SEO -->
    @include('partials.seo')

    <!-- Crisp Chat -->
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="708a26c9-331b-4309-a2d2-2dbe78fbc252";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

    <script>
        function makeTel() {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                // any initialisation options go here
            });
        }
    </script>

    <title>{{ ($website->name ?? env('APP_NAME')) . ' - ' . $page }} | {{ $saas->sentence ?? '' }}</title>
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
    <div class="nav-left-sidebar sidebar-dark" style="background: #A3F200">
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
                        <li class="nav-item">
                            <a class="nav-link @if($route === "home") active @endif()" href="{{ route('home', $prefix) }}"><i class="fa fa-fw fa-user-circle"></i>{{ __('Dashboard') }} <span class="badge badge-success">6</span></a>
                        </li>
                        @if(staffHasRole('members.index') OR staffHasRole('members.create'))
                        <li class="nav-item">
                            <a class="nav-link @if(Str::startsWith($route, 'members.')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#members_menu" aria-controls="submenu-1"><i class="fa fa-users"></i><span onclick="r('{{ route('members.index', $prefix)}}')">{{ __('pages.Members') }}</span></a>
                            <div id="members_menu" class="submenu collapse @if(Str::startsWith($route, 'members.')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if(staffHasRole('members.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'members.create')) active @endif()" href="{{ route('members.create', $prefix) }}">{{ __('members.Add a member') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(staffHasRole('features.index') OR staffHasRole('features.create') 
                            OR staffHasRole('subscriptions.index') OR staffHasRole('subscriptions.create'))
                            <li class="nav-item">
                                <a class="nav-link @if(Str::startsWith($route, 'features') or Str::startsWith($route, 'subscriptions')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-money-check"></i>{{ __('Plans') }}</a>
                            <div id="submenu-2" class="collapse submenu @if(Str::startsWith($route, 'features') or Str::startsWith($route, 'subscriptions')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        @if (staffHasRole('features.index') OR staffHasRole('features.create'))
                                        <a class="nav-link collapsed @if(Str::startsWith($route, 'features')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#features_menu" aria-controls="features_menu">
                                            <span onclick="r('{{ route('features.index', $prefix) }}')">
                                                {{ __('Features') }}
                                            </span>
                                        </a>
                                        <div id="features_menu" class="submenu collapse @if(Str::startsWith($route, 'features')) show @endif()">
                                            <ul class="nav flex-column">
                                                @if(staffHasRole('features.create'))
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'features.create')) active @endif()" href="{{ route('features.create', $prefix) }}">{{ __('Add features') }}</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @endif

                                        @if (staffHasRole('subscriptions.index') OR staffHasRole('subscriptions.create'))
                                        <a class="nav-link collapsed @if(Str::startsWith($route, 'subscriptions')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#subscriptions_menu" aria-controls="subscriptions_menu">
                                            <span onclick="r('{{ route('subscriptions.index', $prefix) }}')">
                                                {{ __('Subscriptions') }}
                                            </span>
                                        </a>
                                        <div id="subscriptions_menu" class="submenu collapse @if(Str::startsWith($route, 'subscriptions')) show @endif()" style="">
                                            <ul class="nav flex-column">
                                                @if (staffHasRole('subscriptions.create'))
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Str::startsWith($route, 'subscriptions.create')) active @endif()" href="{{ route('subscriptions.create', $prefix) }}">{{ __('Add subscription') }}</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('payments.index') OR staffHasRole('payments.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'payments')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#payments_menu" aria-controls="features_menu"><i class="fa fa-dollar-sign"></i> 
                                <span onclick="r('{{ route('payments.index', $prefix) }}')">
                                    {{ __('pages.Payments') }}
                                </span>
                            </a>
                            <div id="payments_menu" class="submenu collapse @if(Str::startsWith($route, 'payments')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('payments.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'payments.create')) active @endif()" href="{{ route('payments.create', $prefix) }}">{{ __('payments.Add a payment') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('vendors.index') OR staffHasRole('vendors.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'vendors')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#vendors_menu" aria-controls="vendors_menu"><i class="fa fa-store"></i> 
                                <span onclick="r('{{ route('vendors.index', $prefix) }}')">
                                    {{ __('pages.Vendors') }}
                                </span>
                            </a>
                            <div id="vendors_menu" class="submenu collapse @if(Str::startsWith($route, 'vendors')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('vendors.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'vendors.create')) active @endif()" href="{{ route('vendors.create', $prefix) }}">{{ __('pages.Add a vendor') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(staffHasRole('credits.index') OR staffHasRole('credits.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'credits')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#credits_menu" aria-controls="credits_menu"><i class="fa fa-hand-holding-usd"></i> 
                                <span onclick="r('{{ route('credits.index', $prefix) }}')">
                                    {{ __('pages.Credits') }}
                                </span>
                            </a>
                            <div id="credits_menu" class="submenu collapse @if(Str::startsWith($route, 'credits')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('credits.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'credits.create')) active @endif()" href="{{ route('credits.create', $prefix) }}">{{ __('credits.Add a credit') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('expenses.index') OR staffHasRole('expenses.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'expenses')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#expenses_menu" aria-controls="expenses_menu"><i class="fa fa-coins"></i> 
                                <span onclick="r('{{ route('expenses.index', $prefix) }}')">
                                    {{ __('pages.Expenses') }}
                                </span>
                            </a>
                            <div id="expenses_menu" class="submenu collapse @if(Str::startsWith($route, 'expenses')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('expenses.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'expenses.create')) active @endif()" href="{{ route('expenses.create', $prefix) }}">{{ __('expenses.Add an expense') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('roles.index') OR staffHasRole('roles.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'roles')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#roles_menu" aria-controls="roles_menu"><i class="fa fa-user-tag"></i> 
                                <span onclick="r('{{ route('roles.index', $prefix) }}')">
                                    {{ __('pages.Roles') }}
                                </span>
                            </a>
                            <div id="roles_menu" class="submenu collapse @if(Str::startsWith($route, 'roles')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('roles.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'roles.create')) active @endif()" href="{{ route('roles.create', $prefix) }}">{{ __('pages.Add a role') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('staves.index') OR staffHasRole('staves.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'staves')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#staves_menu" aria-controls="staves_menu"><i class="fa fa-users-cog"></i> 
                                <span onclick="r('{{ route('staves.index', $prefix) }}')">
                                    {{ __('pages.Staves') }}
                                </span>
                            </a>
                            <div id="staves_menu" class="submenu collapse @if(Str::startsWith($route, 'staves')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('staves.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'staves.create')) active @endif()" href="{{ route('staves.create', $prefix) }}">{{ __('pages.Add a staff') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('memberships.index') OR staffHasRole('memberships.create'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'memberships')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#memberships_menu" aria-controls="memberships_menu"><i class="fa fa-tags"></i> 
                                <span onclick="r('{{ route('memberships.index', $prefix) }}')">
                                    {{ __('membership.Membership') }}
                                </span>
                            </a>
                            <div id="memberships_menu" class="submenu collapse @if(Str::startsWith($route, 'memberships')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('memberships.create'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'memberships.create')) active @endif()" href="{{ route('memberships.create', $prefix) }}">{{ __('pages.Add a membership') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if (staffHasRole('website.settings') OR staffHasRole('user.settings.show') OR staffHasRole('projects.manage'))
                        <li class="nav-item">
                            <a class="nav-link collapsed @if(Str::startsWith($route, 'website.settings') OR Str::startsWith($route, 'user.settings.show')) active @endif()" href="#" data-toggle="collapse" aria-expanded="false" data-target="#settings_menu" aria-controls="settings_menu"><i class="fa fa-cogs"></i> {{ __('pages.Settings') }}</a>
                            <div id="settings_menu" class="submenu collapse @if(Str::startsWith($route, 'website.settings') OR Str::startsWith($route, 'user.settings.show')) show @endif()" style="">
                                <ul class="nav flex-column">
                                    @if (staffHasRole('user.settings.show'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'user.settings.show')) active @endif()" href="{{ route('user.settings.show', $prefix) }}">{{ __('general.Settings') }} <span class="badge badge-success">6</span></a>
                                    </li>
                                    @endif
                                    @if (staffHasRole('website.settings'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'website.settings')) active @endif()" href="{{ route('website.settings', $prefix) }}">{{ __('pages.Project settings') }}</a>
                                    </li>
                                    @endif
                                    @if (staffHasRole('projects.manage'))
                                    <li class="nav-item">
                                        <a class="nav-link @if(Str::startsWith($route, 'projects.manage')) active @endif()" href="{{ route('projects.manage', $prefix) }}">{{ __('project.Manage projects') }}</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        <li class="nav-item" style="margin-bottom: 100px;">
                            <a class="nav-link @if($route === "upcoming.features") active @endif()" href="{{ route('upcoming.features', $prefix) }}"><i class="fa fa-hourglass-end"></i>{{ __('home.Upcoming Features') }} <span class="badge badge-success">6</span></a>
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
        <div class="container-fluid dashboard-content">
            <!-- ================= Free Trial Ad =================== -->
            @php
                $currentProject = \App\Models\Project::where('project', request('project_id'))->first();
            @endphp

            @include('partials.saas_subs_status', ['currentProject' => $currentProject])
            <!-- ================= / Free Trial Ad =================== -->
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
                        Copyright © 2021 {{ env('APP_NAME') }}. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="{{ route('homepage') }}">{{ __('external.Home') }}</a>
                            <a href="{{ route('terms.and.conditions') }}">{{ __('external.Terms and Conditions') }}</a>
                            <a href="{{ makeLink('contact') }}">{{ __('external.Contact us') }}</a>
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

<!-- Bootstrap-select Js -->
<script src="{{ url('assets/vendor/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Data tables Js -->
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
    $(document).ready( function () {
        $('.datatableTable').DataTable();
    } );
    let r = link => {
        return window.location.href = link
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
    });
</script>


@yield('scripts')

</body>

</html>
