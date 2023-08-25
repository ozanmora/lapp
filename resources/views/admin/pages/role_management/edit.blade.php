@extends('admin.layouts.app')

@section('title', trans('admin.title.role_edit'))

@section('page_title', trans('admin.title.role_management'))
@section('page_title_description', trans('admin.title.role_edit'))

@section('breadcrumbs', Breadcrumbs::render('admin.roles.edit', $role))

@section('content')
    {{ html()->form('PUT', route('admin.roles.update', $role))->open() }}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.role_edit') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ html()->submit(trans('admin.button.save'))->class('btn btn-sm btn-primary') }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group @error('name') has-error @enderror">
                    {{ html()->label(trans('role_management.field.name'), 'name') }}
                    {{ html()->text('name', $role->name)->class('form-control')->placeholder(trans('role_management.placeholder.name')) }}
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('slug') has-error @enderror">
                    {{ html()->label(trans('role_management.field.slug'), 'slug') }}
                    {{ html()->text('slug', $role->slug)->class('form-control')->placeholder(trans('role_management.placeholder.slug')) }}
                    @error('slug')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('level') has-error @enderror">
                    {{ html()->label(trans('role_management.field.level'), 'level') }}
                    {{ html()->input('number', 'level', $role->level ?? 0)->class('form-control')->placeholder(trans('role_management.placeholder.level'))->attributes(['min' => 0, 'max' => 5]) }}
                    @error('level')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    {{ html()->label(trans('role_management.field.description'), 'description') }}
                    {{ html()->text('description', $role->description)->class('form-control')->placeholder(trans('role_management.placeholder.description')) }}
                    @error('description')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                @if ($role->slug !== 'root')
                    <div class="form-group @error('permissions') has-error @enderror">
                        {{ html()->label(trans('role_management.field.permissions'), 'permissions') }}
                        {{ html()->select('permissions[]', $permissions, $selected_permissions ?? null)->class('form-control')->attributes(['multiple' => 'multiple']) }}
                        @error('permissions')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            @endcomponent
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
