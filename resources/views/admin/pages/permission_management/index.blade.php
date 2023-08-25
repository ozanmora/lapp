@extends('admin.layouts.app')

@section('title', trans('admin.title.permission_management'))

@section('page_title', trans('admin.title.permission_management'))
@section('page_title_description', trans('admin.title.permissions'))

@section('breadcrumbs', Breadcrumbs::render('admin.permissions'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.permissions') }}
                    @endslot
                    @slot('box_tools')
                        <a href="{{ route('admin.permissions.create') }}"
                            class="btn btn-sm btn-primary">{{ trans('admin.button.create') }}</a>
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('permission_management.column.name') }}</th>
                            <th>{{ trans('permission_management.column.slug') }}</th>
                            <th>{{ trans('permission_management.column.model') }}</th>
                            <th width="150" class="text-center">{{ trans('permission_management.column.relationships') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($permissions) === 0)
                            <tr>
                                <td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td>
                            </tr>
                        @else
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->model }}</td>
                                    <td class="text-center">
                                        <span data-toggle="tooltip" title="{{ trans('permission_management.column.roles') }}"
                                            class="label label-default">{{ count($permission->roles) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.permissions.show', $permission) }}"
                                            class="btn btn-xs btn-info" data-toggle="tooltip"
                                            title="{{ trans('admin.button.view') }}">{!! trans('admin.icon.view') !!}</a>
                                        <a href="{{ route('admin.permissions.edit', $permission) }}"
                                            class="btn btn-xs btn-warning" data-toggle="tooltip"
                                            title="{{ trans('admin.button.edit') }}">{!! trans('admin.icon.edit') !!}</a>
                                        <button class="btn btn-xs btn-danger" data-confirm="DELETE"
                                            data-confirm_form="delete-form-{{ $permission->id }}"
                                            data-confirm_title="{{ trans_choice('permission_management.confirm.title_delete', 1, ['name' => $permission->name]) }}"
                                            data-confirm_message="{{ trans('permission_management.confirm.message_delete') }}"
                                            data-toggle="tooltip"
                                            title="{{ trans('admin.button.delete') }}">{!! trans('admin.icon.delete') !!}</button>
                                        {{ html()->form('DELETE', route('admin.permissions.destroy', $permission))->class('delete-form hide')->id("delete-form-{$permission->id}")->open() }}
                                        {{ html()->form()->close() }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($permissions->total() > $permissions->perPage())
                    @slot('footer')
                        {{ $permissions->links('admin.partials.pagination') }}
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
