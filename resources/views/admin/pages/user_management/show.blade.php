@extends('admin.layouts.app')

@section('title', trans('admin.title.user_show'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.user_show'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.show', $user))

@section('content')
    <div class="row">
        <div class="col-md-3">
            @component('templates.adminlte.components.box', ['box_class' => 'box-primary', 'body_class' => 'box-profile'])
                <img class="profile-user-img img-responsive img-circle" src="{{ Gravatar::get($user->email, ['size' => 160]) }}" alt="">
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->email }}</p>
                @slot('footer')
                <div class="clearfix text-center">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-md btn-warning pull-left">@lang('admin.icon.edit') @lang('admin.button.edit')</a>
                    <button class="btn btn-md btn-danger pull-right"
                        data-confirm="DELETE"
                        data-confirm_form="delete-form-{{ $user->id }}"
                        data-confirm_title="{{ trans_choice('user_management.confirm.title_trash', 1, ['name' => $user->name]) }}"
                        data-confirm_message="{{ trans('user_management.confirm.message_trash') }}">
                        @lang('admin.icon.delete') @lang('admin.button.delete')</button>
                    {!! Form::open([
                        'action' => ['Admin\UserManagement@destroy', $user],
                        'method' => 'DELETE',
                        'class' => 'delete-form hide',
                        'id' => "delete-form-{$user->id}",
                    ]) !!}
                    {!! Form::close() !!}
                </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('footer_scripts')
    @parent
    @include('admin.scripts.modal_confirm')
@endsection
