@extends('admin.layouts.app')

@section('title', trans('admin.title.user_management'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.users_trash'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.trash'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box', ['box_class' => 'box-danger', 'body_class' => 'table-responsive'])
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.users_trash') }}
                    @endslot
                @endslot

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">{{ trans('admin.column.id') }}</th>
                            <th>{{ trans('user_management.column.name') }}</th>
                            <th>{{ trans('user_management.column.email') }}</th>
                            <th width="150" class="text-center">{{ trans('user_management.column.deleted_at') }}</th>
                            <th width="150" class="text-center">{{ trans('admin.column.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) === 0)
                            <tr><td colspan="5" class="text-center">{{ trans('admin.table_no_record') }}</td></tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->deleted_at->format('m/d/Y H:i:s') }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-xs btn-success"
                                            onclick="event.preventDefault(); document.getElementById('restore-form-{{ $user->id }}').submit();"
                                            title="{{ trans('admin.button.restore') }}">{!! trans('admin.icon.restore') !!}</a>
                                        {!! Form::open(['action' => ['Admin\UserSoftDelete@update',$user], 'method' => 'PUT', 'class' => 'restore-form hide', 'id' => "restore-form-{$user->id}"]) !!}
                                        {!! Form::close() !!}
                                        <a href="#" class="btn btn-xs btn-danger"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();"
                                            title="{{ trans('admin.button.delete') }}">{!! trans('admin.icon.delete') !!}</a>
                                        {!! Form::open(['action' => ['Admin\UserSoftDelete@destroy',$user], 'method' => 'DELETE', 'class' => 'delete-form hide', 'id' => "delete-form-{$user->id}"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endempty
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
