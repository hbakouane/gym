<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ $page }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: #F4F4F4F4;
            font-family: 'Rubik' !important;
        }
        .logo-auth {
            height: 120px;
        }
        .input {
            height: 49px;
        }
        .input:focus {
            box-shadow: none;
            border: 1px solid #d0c8c8;
        }
        .input-group-text {
            background: white;
        }
        .input-group-text , .input {
            border: 1px solid #d0c8c8;
        }
        .input-group-text {
            color: #968f8f;
        }
        .btn-main {
            background: #050a27;
            border: #050a27;
            height: 40px;
            width: 200px;
            border-radius: 12px;
        }
        .btn-main:hover, .btn-main:focus, .btn-primary.btn-main:focus {
            background: #1b1f53 !important;
        }
        .bg-side {
            background-image: url(https://img5.goodfon.com/wallpaper/nbig/f/15/back-fitness-gym-power-pose.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh;
        }
        input[type=checkbox] {
            appearance: none;
            height: 13px;
            width: 13px;
            background: white;
            border-radius: 3px;
            border: 1px solid #a6afb8;
        }
        input[type=checkbox]:checked {
            background: #050a27 !important;
        }
        @media screen and (max-width: 1100px) {
            .bg-side {
                display: none;
            }
            .col-md-4.short-side {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
