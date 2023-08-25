@extends('admin.layouts.app')

@section('title', trans('admin.title.user_management'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.users'))

@section('breadcrumbs', Breadcrumbs::render('admin.users'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box', ['body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.users') }}
                    @endslot
                    @slot('box_tools')
                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.create')))
                            <a href="{{ route('admin.users.create') }}"
                                class="btn btn-sm btn-primary">{{ trans('admin.button.create') }}</a>
                        @endif
                        @role('root')
                            <a href="{{ route('admin.users.trash') }}" class="btn btn-sm btn-danger">{{ trans('admin.button.trash') }}</a>
                        @endrole
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('user_management.column.name') }}</th>
                            <th>{{ trans('user_management.column.email') }}</th>
                            <th class="text-center">{{ trans('user_management.column.role') }}</th>
                            <th width="150" class="text-center">{{ trans('user_management.column.created_at') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) === 0)
                            <tr>
                                <td colspan="6" class="text-center">{{ trans('admin.table_no_record') }}</td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if ($user->roles->first())
                                            <span
                                                class="label label-role_{{ $user->roles->first()->slug }}">{{ $user->roles->first()->name }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $user->created_at->format('m/d/Y H:i:s') }}</td>
                                    <td class="text-center">
                                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.view')))
                                            <a href="{{ route('admin.users.view', $user) }}" class="btn btn-xs btn-info"
                                                data-toggle="tooltip"
                                                title="{{ trans('admin.button.view') }}">{!! trans('admin.icon.view') !!}</a>
                                        @endif
                                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.edit')))
                                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-warning"
                                                data-toggle="tooltip"
                                                title="{{ trans('admin.button.edit') }}">{!! trans('admin.icon.edit') !!}</a>
                                        @endif
                                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.delete')))
                                            <button
                                                class="btn btn-xs btn-danger @if ($user->level() > Auth::user()->level() || (int) $user->id === (int) Auth::user()->id) disabled @endif "
                                                data-confirm="DELETE" data-confirm_form="delete-form-{{ $user->id }}"
                                                data-confirm_title="{{ trans_choice('user_management.confirm.title_trash', 1, ['name' => $user->name]) }}"
                                                data-confirm_message="{{ trans('user_management.confirm.message_trash') }}"
                                                data-toggle="tooltip"
                                                title="{{ trans('admin.button.trash') }}">{!! trans('admin.icon.trash') !!}</button>
                                            {{ html()->form('DELETE', route('admin.users.delete', $user))->class('delete-form hide')->id("delete-form-{$user->id}")->open() }}
                                            {{ html()->form()->close() }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($users->total() > $users->perPage())
                    @slot('footer')
                        {{ $users->links('admin.partials.pagination') }}
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
