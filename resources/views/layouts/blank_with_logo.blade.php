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

    <!-- Phone Input CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

    <!-- Page infos -->
    @php
        $page = $page ?? __('Dashboard');
        $breadcumbs = $breadcumbs ?? [$page => route('home', $prefix)];
        $route = \Request::route()->getName();
    @endphp
    <!-- / Page infos -->
    <title>{{ env('APP_NAME') . ' - ' . $page }}</title>
</head>

<body>

    @yield('content')

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>

</body>

</html>
