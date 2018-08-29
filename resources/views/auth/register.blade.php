@extends('templates.adminlte.layouts.auth')

@section('title', trans('auth.title.register'))

@section('content')
    <div class="login-box-body">
        @include('templates.adminlte.partials.alerts')
        <p class="login-box-msg">{{ trans('auth.message.register') }}</p>

        {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
            <div class="form-group has-feedback">
                {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.name')]) !!}
                {!! trans('auth.icon.name') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::email('email', null, ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.email')]) !!}
                {!! trans('auth.icon.email') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password', ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.password')]) !!}
                {!! trans('auth.icon.password') !!}
            </div>
            <div class="form-group has-feedback">
                {!! Form::password('password_confirmation', ['class' => 'form-control' , 'placeholder' => trans('auth.placeholder.password_confirmation')]) !!}
                {!! trans('auth.icon.password_confirmation') !!}
            </div>
            <div class="clearfix">
                {!! Form::button(trans('auth.button.register'), ['type' => 'submit', 'class' => 'btn btn-block btn-flat btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        <div class="text-center">
            <p>- {{ __('OR') }} -</p>
            <a class="btn btn-link" href="{{ route('login') }}">{{ trans('auth.text.login') }}</a>
        </div>
    </div>
    <!-- /.login-box-body -->
@endsection
