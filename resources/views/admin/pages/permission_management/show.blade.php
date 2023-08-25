@extends('admin.layouts.app')

@section('title', trans('admin.title.permission_show'))

@section('page_title', trans('admin.title.permission_management'))
@section('page_title_description', trans('admin.title.permission_show'))

@section('breadcrumbs', Breadcrumbs::render('admin.permissions.show', $permission))

@section('content')
    <div class="row">
        <div class="col-md-3">
            @component('templates.adminlte.components.box', ['box_class' => 'box-primary', 'body_class' => 'p-0'])
                @slot('header')
                    @slot('title')
                        {{ $permission->name }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>{{ trans('permission_management.field.name') }}</th>
                            <td class="text-right">{{ $permission->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('permission_management.field.slug') }}</th>
                            <td class="text-right">{{ $permission->slug }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('permission_management.field.model') }}</th>
                            <td class="text-right">{{ $permission->model }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('permission_management.field.description') }}</th>
                            <td class="text-right">{{ $permission->description }}</td>
                        </tr>
                    </tbody>
                </table>

                @slot('footer')
                    <div class="clearfix text-center">
                        <a href="{{ route('admin.permissions.edit', $permission) }}"
                            class="btn btn-md btn-warning pull-left">@lang('admin.icon.edit') @lang('admin.button.edit')</a>
                        <button class="btn btn-md btn-danger pull-right" data-confirm="DELETE"
                            data-confirm_form="delete-form-{{ $permission->id }}"
                            data-confirm_title="{{ trans_choice('permission_management.confirm.title_delete', 1, ['name' => $permission->name]) }}"
                            data-confirm_message="{{ trans('permission_management.confirm.message_delete') }}">
                            @lang('admin.icon.delete') @lang('admin.button.delete')</button>
                        {{ html()->form('DELETE', route('admin.permissions.destroy', $permission))->class('delete-form hide')->id("delete-form-{$permission->id}")->open() }}
                        {{ html()->form()->close() }}
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-9">
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.roles') }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('role_management.column.name') }}</th>
                            <th>{{ trans('role_management.column.slug') }}</th>
                            <th width="150" class="text-center">{{ trans('role_management.column.level') }}</th>
                            <th width="150" class="text-center">{{ trans('role_management.column.relationships') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($permission->roles) === 0)
                            <tr>
                                <td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td>
                            </tr>
                        @else
                            @foreach ($permission->roles as $role)
                                <tr>
                                    <td class="text-center">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td class="text-center">{{ $role->level }}</td>
                                    <td class="text-center">
                                        <span data-toggle="tooltip" title="{{ trans('role_management.column.users') }}"
                                            class="label label-default">{{ count($role->users) }}</span>
                                        <span data-toggle="tooltip" title="{{ trans('role_management.column.permissions') }}"
                                            class="label label-default">{{ count($role->permissions) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-xs btn-info"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.view') }}">{!! trans('admin.icon.view') !!}</a>
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-xs btn-warning"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.edit') }}">{!! trans('admin.icon.edit') !!}</a>
                                        <button class="btn btn-xs btn-danger" data-confirm="DETACH"
                                            data-confirm_form="detach_role-form-{{ $role->id }}"
                                            data-confirm_title="{{ trans_choice('permission_management.confirm.title_detach_role', 1, ['name' => $role->name]) }}"
                                            data-confirm_message="{{ trans('permission_management.confirm.message_detach_role') }}"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.detach') }}">{!! trans('admin.icon.detach') !!}</button>
                                        {{ html()->form('DELETE', route('admin.permissions.detach', ['permission_id' => $permission->id, 'model' => 'role', 'id' => $role->id]))->class('detach_role-form hide')->id("detach_role-form-{$role->id}")->open() }}
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endcomponent
        </div>
    </div>
@endsection

@section('footer_scripts')
    @parent
    @include('admin.scripts.modal_confirm')
@endsection
