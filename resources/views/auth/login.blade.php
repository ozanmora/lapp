@extends('templates.adminlte.layouts.auth')

@section('title', trans('auth.title.login'))

@section('content')
    <div class="login-box-body">
        @include('templates.adminlte.partials.alerts')
        <p class="login-box-msg">{{ trans('auth.message.login') }}</p>

        {{ html()->form('POST', route('login'))->open() }}
            <div class="form-group has-feedback @error('email') has-error @enderror">
                {{ html()->email('email')->class(['form-control'])->placeholder(trans('auth.placeholder.email')) }}
                {!! trans('auth.icon.email') !!}

                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                {{ html()->password('password')->class('form-control')->placeholder(trans('auth.placeholder.password')) }}
                {!! trans('auth.icon.password') !!}
                @error('password')
                    <span class="help-block">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox">
                        <label>{{ html()->checkbox('remember', old('remember') === 1, 1) }} {{ trans('auth.label.remember') }}</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    {{ html()->button(trans('auth.button.sign_in'), 'submit')->class('btn btn-block btn-flat btn-primary') }}
                </div>
            </div>
        {{ html()->form()->close() }}
        <div class="text-center">
            <p>- {{ __('OR') }} -</p>
            <a class="btn btn-link" href="{{ route('password.request') }}">{{ trans('auth.text.forgot_password') }}</a><br>
            <a class="btn btn-link" href="{{ route('register') }}">{{ trans('auth.text.register') }}</a>
        </div>
    </div>
    <!-- /.login-box-body -->
@endsection
