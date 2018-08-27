@extends('admin.layouts.app')

@section('title', trans('admin.title.permission_create'))

@section('page_title', trans('admin.title.permission_management'))
@section('page_title_description', trans('admin.title.permission_create'))

@section('breadcrumbs', Breadcrumbs::render('admin.permissions.create'))

@section('content')
{!! Form::open(['action' => 'Admin\PermissionManagement@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.permission_create') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ Form::submit(trans('admin.button.save'), ['class' => 'btn btn-sm btn-primary']) }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group">
                    {{ Form::label('name', trans('permission_management.field.name')) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('permission_management.placeholder.name')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', trans('permission_management.field.slug')) }}
                    {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('permission_management.placeholder.slug')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('model', trans('permission_management.field.model')) }}
                    {{ Form::text('model', null, ['class' => 'form-control', 'placeholder' => trans('permission_management.placeholder.model')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', trans('permission_management.field.description')) }}
                    {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('permission_management.placeholder.description')]) }}
                </div>
            @endcomponent
        </div>
    </div>
{!! Form::close() !!}
@endsection
