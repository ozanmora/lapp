<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LAPP') }}</title>

    @section('styles')
        <link href="{{ mix('/css/admin-lte.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/auth.css') }}" rel="stylesheet">
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header_styles')

    @stack('head')
</head>
<body class="hold-transition login-page">
    <div class="login-box" id="app">
        <div class="login-logo">
            <a href="/"><b>@hasSection('title') @yield('title') @else {{ config('app.name', 'LAPP') }} @endif</b></a>
        </div>
        <!-- /.auth-logo -->

        @yield('content')
    </div>

    @section('scripts')
        <script src="{{ mix('/js/manifest.js') }}" charset="utf-8"></script>
        <script src="{{ mix('/js/vendor.js') }}" charset="utf-8"></script>
        <script src="{{ mix('/js/auth.js') }}" charset="utf-8"></script>
    @show
    @yield('footer_scripts')

    @stack('body')
</body>
</html>
