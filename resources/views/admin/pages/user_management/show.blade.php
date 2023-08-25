@extends('admin.layouts.app')

@section('title', trans('admin.title.user_show'))

@section('page_title', trans('admin.title.user_management'))
@section('page_title_description', trans('admin.title.user_show'))

@section('breadcrumbs', Breadcrumbs::render('admin.users.view', $user))

@section('content')
    <div class="row">
        <div class="col-md-4">
            @component('templates.adminlte.components.box', ['box_class' => 'box-primary', 'body_class' => 'box-profile'])
                <img class="profile-user-img img-responsive img-circle" src="{{ Gravatar::get($user->email, ['size' => 160]) }}"
                    alt="">
                <h3 class="profile-username text-center">
                    {{ $user->name }}
                </h3>
                <p class="text-center">
                    <small
                        class="label label-role_{{ $user->roles->first()->slug }}">{{ $user->roles->first()->name }}</small><br>
                    <small class="text-muted">{{ $user->email }}</small>
                </p>
                @if ($user->getPermissions())
                    <hr>
                    <h4 class="text-center">{{ trans('user_management.column.permissions') }}</h4>
                    <p class="text-center">
                        @foreach ($user->getPermissions() as $permission)
                            <span class="label label-default">{{ $permission->name }}</span>
                        @endforeach
                    </p>
                @endif
                @slot('footer')
                    <div class="clearfix text-center">
                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.edit')))
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="btn btn-md btn-warning pull-left">@lang('admin.icon.edit') @lang('admin.button.edit')</a>
                        @endif
                        @if (Auth::check() && (Auth::user()->hasRole('root') || Auth::user()->hasPermission('users.delete')))
                            <button class="btn btn-md btn-danger pull-right @if ($user->level() > Auth::user()->level() || (int) $user->id === (int) Auth::user()->id) disabled @endif"
                                data-confirm="DELETE" data-confirm_form="delete-form-{{ $user->id }}"
                                data-confirm_title="{{ trans_choice('user_management.confirm.title_trash', 1, ['name' => $user->name]) }}"
                                data-confirm_message="{{ trans('user_management.confirm.message_trash') }}">
                                @lang('admin.icon.delete') @lang('admin.button.delete')</button>
                            {{ html()->form('DELETE', route('admin.users.delete', $user))->class('delete-form hide')->id("delete-form-{$user->id}")->open() }}
                            {{ html()->form()->close() }}
                        @endif
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
