@extends('admin.layouts.app')

@section('title', trans('admin.title.dashboard'))

@section('page_title', trans('admin.title.dashboard'))

@section('breadcrumbs', Breadcrumbs::render('admin.dashboard'))

@section('content')
    <div class="row">
        <div class="col-md-4">
            @component('templates.adminlte.components.box')
                @slot('title')
                    Test
                @endslot
                @slot('box_tools')
                    <a href="#" class="btn btn-sm btn-primary">{{ trans('admin.button.create') }}</a>
                @endslot

                Test component feature
            @endcomponent
        </div>
    </div>
@endsection
