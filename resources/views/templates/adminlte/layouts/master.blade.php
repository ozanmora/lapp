<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title')@yield('title') | @endif {{ config('app.name', 'LAPP') }}</title>

    @section('styles')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
<body class="hold-transition skin-{{ config('adminlte.skin_color', 'blue') }} {{ config('adminlte.sidebar_type', 'sidebar-mini') }}">
    <div id="app" class="wrapper">

        <!-- Main Header -->
        @include('templates.adminlte.layouts.main_header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('templates.adminlte.layouts.main_sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('templates.adminlte.layouts.content_wrapper')

        <!-- Main Footer -->
        @include('templates.adminlte.layouts.main_footer')

    </div>

    @section('scripts')
        <script src="{{ asset('/js/app.js') }}"></script>
    @show
    @yield('footer_scripts')

    @stack('body')
</body>
</html>
