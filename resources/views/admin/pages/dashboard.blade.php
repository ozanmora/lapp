@extends('admin.layouts.app')

@section('title', trans('admin.dashboard.title'))

@section('page_title', trans('admin.dashboard.title'))
@section('page_title_description', trans('admin.dashboard.page_title_description'))

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard'))

@section('content')
    <div class="row">
        <div class="col-md-4">
            @component('templates.adminlte.components.box')
                @slot('title')
                    Test
                @endslot
                @slot('box_tools')
                    <a href="#" class="btn btn-sm btn-primary">{{ trans('admin.create.button_text') }}</a>
                @endslot

                Test component feature
            @endcomponent
        </div>
    </div>
@endsection
