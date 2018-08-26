@extends('admin.layouts.app')

@section('title', trans('admin.title.user_edit'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.user_edit'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.edit', $user))

@section('content')
{!! Form::open(['action' => [ 'Admin\UserManagement@update', $user ], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.user_edit') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ Form::submit(trans('admin.button.save'), ['class' => 'btn btn-sm btn-primary']) }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group">
                    {{ Form::label('name', trans('user_management.field.name')) }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => trans('user_management.placeholder.name')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', trans('user_management.field.email')) }}
                    {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => trans('user_management.placeholder.email')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', trans('user_management.field.password')) }}
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('user_management.placeholder.password')]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('user_management.field.password_confirmation')) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('user_management.placeholder.password_confirmation')]) }}
                </div>

                <div class="form-group">
                    {!! Form::label('role', trans('user_management.field.role')); !!}
                    {{ Form::select('role', $roles, $current_role, ['class' => 'form-control select2', 'placeholder' => trans('user_management.placeholder.role')]) }}
                </div>
            @endcomponent
        </div>
    </div>
{!! Form::close() !!}
@endsection
