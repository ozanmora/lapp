<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">{{ trans('adminlte.text.laravel') }} <b>{{ App::VERSION() }}</b></div>
    <!-- Default to the left -->
    <strong>{{ trans('adminlte.text.copyright') }} &copy; @yield('app_date', date('Y')) <a href="@yield('app_company_link', 'http://www.ozanmora.com')">@yield('app_company_name', 'Ozan Mora')</a>.</strong> {{ trans('adminlte.text.all_rights_reserved') }}
</footer>
<!-- /.main-footer -->
