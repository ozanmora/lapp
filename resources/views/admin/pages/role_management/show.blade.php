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
        <div class="col-md-9">
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.users') }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('user_management.column.name') }}</th>
                            <th>{{ trans('user_management.column.email') }}</th>
                            <th width="150" class="text-center">{{ trans('user_management.column.created_at') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($role->users) === 0)
                            <tr><td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td></tr>
                        @else
                            @foreach ($role->users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->created_at->format('m/d/Y H:i:s') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-info" title="{{ trans('admin.button.view') }}">{!! trans('admin.icon.view') !!}</a>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-warning" title="{{ trans('admin.button.edit') }}">{!! trans('admin.icon.edit') !!}</a>
                                        <button class="btn btn-xs btn-danger"
                                            data-confirm="DETACH"
                                            data-confirm_form="detach_user-form-{{ $user->id }}"
                                            data-confirm_title="{{ trans_choice('role_management.confirm.title_detach_user', 1, ['name' => $user->name]) }}"
                                            data-confirm_message="{{ trans('role_management.confirm.message_detach_user') }}"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.detach') }}">{!! trans('admin.icon.detach') !!}</button>
                                        {!! Form::open([
                                            'action' => ['Admin\RoleManagement@detach', 'role_id' => $role->id, 'model' => 'user', 'id' => $user->id ],
                                            'method' => 'PUT',
                                            'class' => 'detach-form hide',
                                            'id' => "detach_user-form-{$user->id}",
                                        ]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endcomponent
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.permissions') }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('permission_management.column.name') }}</th>
                            <th>{{ trans('permission_management.column.slug') }}</th>
                            <th>{{ trans('permission_management.column.model') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($role->permissions) === 0)
                            <tr><td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td></tr>
                        @else
                            @foreach ($role->permissions as $permission)
                                <tr>
                                    <td class="text-center">{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->model }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-xs btn-info" data-toggle="tooltip" title="{{ trans('admin.button.view') }}">{!! trans('admin.icon.view') !!}</a>
                                        <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="{{ trans('admin.button.edit') }}">{!! trans('admin.icon.edit') !!}</a>
                                        <button class="btn btn-xs btn-danger"
                                            data-confirm="DETACH"
                                            data-confirm_form="detach_permission-form-{{ $permission->id }}"
                                            data-confirm_title="{{ trans_choice('role_management.confirm.title_detach_permission', 1, ['name' => $permission->name]) }}"
                                            data-confirm_message="{{ trans('role_management.confirm.message_detach_permission') }}"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.detach') }}">{!! trans('admin.icon.detach') !!}</button>
                                        {!! Form::open([
                                            'action' => ['Admin\RoleManagement@detach', 'role_id' => $role->id, 'model' => 'permission', 'id' => $permission->id ],
                                            'method' => 'PUT',
                                            'class' => 'detach-form hide',
                                            'id' => "detach_permission-form-{$permission->id}",
                                        ]) !!}
                                        {!! Form::close() !!}
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
