@extends('admin.layouts.app')

@section('title', trans('admin.title.role_edit'))

@section('page_title', trans('admin.title.role_management'))
@section('page_title_description', trans('admin.title.role_edit'))

@section('breadcrumbs', Breadcrumbs::render('admin.roles.edit', $role))

@section('content')
{!! Form::open(['action' => ['Admin\RoleManagement@update', $role], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.role_edit') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ Form::submit(trans('admin.button.save'), ['class' => 'btn btn-sm btn-primary']) }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group">
                    {{ Form::label('name', trans('role_management.field.name')) }}
                    {{ Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => trans('role_management.placeholder.name')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('slug', trans('role_management.field.slug')) }}
                    {{ Form::text('slug', $role->slug, ['class' => 'form-control', 'placeholder' => trans('role_management.placeholder.slug')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('level', trans('role_management.field.level')) }}
                    {{ Form::number('level', $role->level, ['class' => 'form-control', 'placeholder' => trans('role_management.placeholder.level'), 'min' => 0, 'max' => 5]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', trans('role_management.field.description')) }}
                    {{ Form::text('description', $role->description, ['class' => 'form-control', 'placeholder' => trans('role_management.placeholder.description')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('permissions', trans('role_management.field.permissions')) }}
                    {{ Form::select('permissions[]', $permissions, $selected_permissions, ['id' => 'permissions', 'class' => 'form-control select2', 'multiple' => 'multiple']) }}
                </div>
            @endcomponent
        </div>
    </div>
{!! Form::close() !!}
@endsection
