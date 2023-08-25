@extends('templates.adminlte.layouts.auth')

@section('title', trans('auth.title.forgot_password'))

@section('content')
    <div class="login-box-body">
        @include('templates.adminlte.partials.alerts')
        <p class="login-box-msg">{{ trans('auth.message.forgot_password') }}</p>

        {!! Form::open(['route' => 'password.email', 'method' => 'POST']) !!}
            <div class="form-group has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.email')]) !!}
                {!! trans('auth.icon.email') !!}
            </div>
            <div class="clearfix">
                {!! Form::button(trans('auth.button.forgot_password'), ['type' => 'submit', 'class' => 'btn btn-block btn-flat btn-primary']) !!}
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
