@extends('admin.layouts.app')

@section('title', trans('admin.title.permission_create'))

@section('page_title', trans('admin.title.permission_management'))
@section('page_title_description', trans('admin.title.permission_create'))

@section('breadcrumbs', Breadcrumbs::render('admin.permissions.create'))

@section('content')
    {{ html()->form('POST', route('admin.permissions.create'))->open() }}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.permission_create') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ html()->submit(trans('admin.button.save'))->class('btn btn-sm btn-primary') }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group @error('name') has-error @enderror">
                    {{ html()->label(trans('permission_management.field.name'), 'name') }}
                    {{ html()->text('name')->class('form-control')->placeholder(trans('permission_management.placeholder.name')) }}
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('slug') has-error @enderror">
                    {{ html()->label(trans('permission_management.field.slug'), 'slug') }}
                    {{ html()->text('slug')->class('form-control')->placeholder(trans('permission_management.placeholder.slug')) }}
                    @error('slug')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('model') has-error @enderror">
                    {{ html()->label(trans('permission_management.field.model'), 'model') }}
                    {{ html()->text('model')->class('form-control')->placeholder(trans('permission_management.placeholder.model')) }}
                    @error('model')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    {{ html()->label(trans('permission_management.field.description'), 'description') }}
                    {{ html()->text('description')->class('form-control')->placeholder(trans('permission_management.placeholder.description')) }}
                    @error('description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            @endcomponent
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
