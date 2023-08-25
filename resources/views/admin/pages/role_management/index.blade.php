@extends('admin.layouts.app')

@section('title', trans('admin.title.role_management'))

@section('page_title', trans('admin.title.role_management'))
@section('page_title_description', trans('admin.title.roles'))

@section('breadcrumbs', Breadcrumbs::render('admin.roles'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.roles') }}
                    @endslot
                    @slot('box_tools')
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">{{ trans('admin.button.create') }}</a>
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
                        @if (count($roles) === 0)
                            <tr>
                                <td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td>
                            </tr>
                        @else
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="text-center">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td><span class="label label-role_{{ $role->slug }}">{{ $role->name }}</span></td>
                                    <td class="text-center"><span
                                            class="label label-level_{{ $role->level }}">{{ $role->level }}</span></td>
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
                                        <button class="btn btn-xs btn-danger @if ($role->slug === 'root') disabled @endif"
                                            data-confirm="DELETE" data-confirm_form="delete-form-{{ $role->id }}"
                                            data-confirm_title="{{ trans_choice('role_management.confirm.title_delete', 1, ['name' => $role->name]) }}"
                                            data-confirm_message="{{ trans('role_management.confirm.message_delete') }}"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.delete') }}">{!! trans('admin.icon.delete') !!}</button>
                                        {{ html()->form('DELETE', route('admin.roles.destroy', $role))->class('delete-form hide')->id("delete-form-{$role->id}")->open() }}
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($roles->total() > $roles->perPage())
                    @slot('footer')
                        {{ $roles->links('admin.partials.pagination') }}
                    @endslot
                @endif
            @endcomponent
        </div>
    </div>
@endsection

@section('footer_scripts')
    @parent
    @include('admin.scripts.modal_confirm')
@endsection
