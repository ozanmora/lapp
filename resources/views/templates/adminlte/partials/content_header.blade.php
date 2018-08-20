<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('page_title', 'Page Header')
        @hasSection('page_title_description')<small>@yield('page_title_description', 'Optional Description')</small>@endif
    </h1>
    @include('templates.adminlte.partials.breadcrumbs')
</section>
