@extends('admin.layouts.app')

@section('title', trans('admin.title.role_show'))

@section('page_title', trans('admin.title.role_management'))
@section('page_title_description', trans('admin.title.role_show'))

@section('breadcrumbs', Breadcrumbs::render('admin.roles.show', $role))

@section('content')
    <div class="row">
        <div class="col-md-3">
            @component('templates.adminlte.components.box', ['box_class' => 'box-primary', 'body_class' => 'p-0'])
                @slot('header')
                    @slot('title')
                        {{ $role->name }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <tbody>
                        <tr><th>{{ trans('role_management.field.name') }}</th><td class="text-right">{{ $role->name }}</td></tr>
                        <tr><th>{{ trans('role_management.field.slug') }}</th><td class="text-right">{{ $role->slug }}</td></tr>
                        <tr><th>{{ trans('role_management.field.description') }}</th><td class="text-right">{{ $role->description }}</td></tr>
                        <tr><th>{{ trans('role_management.field.level') }}</th><td class="text-right">{{ $role->level }}</td></tr>
                    </tbody>
                </table>

                @slot('footer')
                <div class="clearfix text-center">
                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-md btn-warning pull-left">@lang('admin.icon.edit') @lang('admin.button.edit')</a>
                    <button class="btn btn-md btn-danger pull-right"
                        data-confirm="DELETE"
                        data-confirm_form="delete-form-{{ $role->id }}"
                        data-confirm_title="{{ trans_choice('role_management.confirm.title_delete', 1, ['name' => $role->name]) }}"
                        data-confirm_message="{{ trans('role_management.confirm.message_delete') }}">
                        @lang('admin.icon.delete') @lang('admin.button.delete')</button>
                    {!! Form::open([
                        'action' => ['Admin\RoleManagement@destroy', $role],
                        'method' => 'DELETE',
                        'class' => 'delete-form hide',
                        'id' => "delete-form-{$role->id}",
                    ]) !!}
                    {!! Form::close() !!}
                </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('footer_scripts')
    @parent
    @include('admin.scripts.modal_confirm')
@endsection
