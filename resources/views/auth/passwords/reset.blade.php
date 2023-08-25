@extends('templates.adminlte.layouts.auth')

@section('title', trans('auth.title.reset_password'))

@section('content')
    <div class="login-box-body">
        @include('templates.adminlte.partials.alerts')
        <p class="login-box-msg">{{ trans('auth.message.reset_password') }}</p>

        {!! Form::open(['route' => 'password.request', 'method' => 'POST']) !!}
            {!! Form::hidden('token', $token) !!}
            <div class="form-group has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.email')]) !!}
                {!! trans('auth.icon.email') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.new_password')]) !!}
                {!! trans('auth.icon.password') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password_confirmation', ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.password_confirmation')]) !!}
                {!! trans('auth.icon.password_confirmation') !!}
            </div>
            <div class="clearfix">
                {!! Form::button(trans('auth.button.reset_password'), ['type' => 'submit', 'class' => 'btn btn-block btn-flat btn-primary']) !!}
            </div>
        {{ html()->form()->close() }}
        <div class="text-center">
            <p>- {{ __('OR') }} -</p>
            <a class="btn btn-link" href="{{ route('login') }}">{{ trans('auth.text.login') }}</a><br>
            <a class="btn btn-link" href="{{ route('register') }}">{{ trans('auth.text.register') }}</a>
        </div>
    </div>
    <!-- /.login-box-body -->
@endsection
