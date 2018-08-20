<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('templates.adminlte.partials.content_header')

    <!-- Main content -->
    <section class="content container-fluid">
        @include('templates.adminlte.partials.alerts')

        @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
