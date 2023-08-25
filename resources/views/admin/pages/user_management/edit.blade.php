@extends('admin.layouts.app')

@section('title', trans('admin.title.user_edit'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.user_edit'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.edit', $user))

@section('content')
    {{ html()->form('PUT', route('admin.users.update', $user))->open() }}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.user_edit') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ html()->submit(trans('admin.button.save'))->class('btn btn-sm btn-primary') }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group @error('name') has-error @enderror">
                    {{ html()->label(trans('user_management.field.name'), 'name') }}
                    {{ html()->text('name', $user->name)->class('form-control')->placeholder(trans('user_management.placeholder.name')) }}
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    {{ html()->label(trans('user_management.field.email'), 'email') }}
                    {{ html()->email('email', $user->email)->class('form-control')->placeholder(trans('user_management.placeholder.email')) }}
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    {{ html()->label(trans('user_management.field.password'), 'password') }}
                    {{ html()->password('password', null)->class('form-control')->placeholder(trans('user_management.placeholder.password'))->attributes(['autocomplete' => 'off']) }}
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('password_confirmation') has-error @enderror">
                    {{ html()->label(trans('user_management.field.password_confirmation'), 'password_confirmation') }}
                    {{ html()->password('password_confirmation', null)->class('form-control')->placeholder(trans('user_management.placeholder.password_confirmation'))->attributes(['autocomplete' => 'off']) }}
                    @error('password_confirmation')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('role') has-error @enderror">
                    {{ html()->label(trans('user_management.field.role'), 'role') }}
                    {{ html()->select('role', $roles, $user->roles->first()->id ?? null)->class('form-control')->placeholder(trans('user_management.placeholder.role')) }}
                    @error('role')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            @endcomponent
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
