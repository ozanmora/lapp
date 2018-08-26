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
                                            data-confirm="DELETE"
                                            data-confirm_form="delete-form-{{ $user->id }}"
                                            data-confirm_title="{{ trans_choice('user_management.confirm.title_trash', 1, ['name' => $user->name]) }}"
                                            data-confirm_message="{{ trans('user_management.confirm.message_trash') }}"
                                            title="{{ trans('admin.button.trash') }}">{!! trans('admin.icon.trash') !!}</button>
                                        {!! Form::open([
                                            'action' => ['Admin\UserManagement@destroy', $user],
                                            'method' => 'DELETE',
                                            'class' => 'delete-form hide',
                                            'id' => "delete-form-{$user->id}",
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
