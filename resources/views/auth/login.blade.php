@extends('templates.adminlte.layouts.auth')

@section('title', trans('auth.title.login'))

@section('content')
    <div class="login-box-body">
        @include('templates.adminlte.partials.alerts')
        <p class="login-box-msg">{{ trans('auth.message.login') }}</p>

        {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
            <div class="form-group has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.email')]) !!}
                {!! trans('auth.icon.email') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.password')]) !!}
                {!! trans('auth.icon.password') !!}
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox">
                        <label>{!! Form::checkbox('remember', 1, old('remember')) !!} {{ trans('auth.label.remember') }}</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    {!! Form::button(trans('auth.button.sign_in'), ['type' => 'submit', 'class' => 'btn btn-block btn-flat btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <div class="text-center">
            <p>- {{ __('OR') }} -</p>
            <a class="btn btn-link" href="{{ route('password.request') }}">{{ trans('auth.text.forgot_password') }}</a><br>
            <a class="btn btn-link" href="{{ route('register') }}">{{ trans('auth.text.register') }}</a>
        </div>
    </div>
    <!-- /.login-box-body -->
@endsection
