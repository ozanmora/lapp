@extends('templates.adminlte.layouts.master')

@if (auth()->check())
    @section('user_avatar', Gravatar::get(auth()->user()->email, ['size' => 160]))
    @section('user_name', auth()->user()->name)
    @section('user_role', auth()->user()->roles[0]->name)
    @section('user_member_since', auth()->user()->created_at->format('M Y'))
@endif

@section('sidebar_menu')
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{ trans('admin.menu.header') }}</li>
        @include('admin.partials.sidebar_menu_items', ['items' => Menu::get('AdminSidebarMenu')->roots()])
    </ul>
    <!-- /.sidebar-menu -->
@endsection
