@extends('admin.layouts.app')

@section('title', trans('admin.title.user_create'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.user_create'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.create'))

@section('content')
    {{ html()->form('POST', route('admin.users.store'))->open() }}
    <div class="row">
        <div class="col-xs-12">
            @component('templates.adminlte.components.box')
                @slot('header')
                    @slot('title')
                        {{ trans('admin.title.user_create') }}
                    @endslot
                @endslot
                @slot('box_tools')
                    {{ html()->submit(trans('admin.button.save'))->class('btn btn-sm btn-primary') }}
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-default">{{ trans('admin.button.back') }}</a>
                @endslot
                <div class="form-group @error('name') has-error @enderror">
                    {{ html()->label(trans('user_management.field.name'), 'name') }}
                    {{ html()->text('name')->class('form-control')->placeholder(trans('user_management.placeholder.name')) }}
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    {{ html()->label(trans('user_management.field.email'), 'email') }}
                    {{ html()->email('email')->class('form-control')->placeholder(trans('user_management.placeholder.email')) }}
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    {{ html()->label(trans('user_management.field.password'), 'password') }}
                    {{ html()->password('password')->class('form-control')->placeholder(trans('user_management.placeholder.password')) }}
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('password_confirmation') has-error @enderror">
                    {{ html()->label(trans('user_management.field.password_confirmation'), 'password_confirmation') }}
                    {{ html()->password('password_confirmation')->class('form-control')->placeholder(trans('user_management.placeholder.password_confirmation')) }}
                    @error('password_confirmation')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group @error('role') has-error @enderror">
                    {{ html()->label(trans('user_management.field.role'), 'role') }}
                    {{ html()->select('role', $roles)->class('form-control')->placeholder(trans('user_management.placeholder.role')) }}
                    @error('role')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            @endcomponent
        </div>
    </div>
    {{ html()->form()->close() }}
@endsection
