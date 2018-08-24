<?php

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(trans('admin.breadcrumb.dashboard'), route('admin'));
});

// Admin Profile
Breadcrumbs::for('admin.profile', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(trans('admin.breadcrumb.profile'), route('admin.profile'));
});

// Admin User Management
Breadcrumbs::for('admin.user_management', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(trans('admin.breadcrumb.user_management'), route('admin.users'));
});

// Admin User List
Breadcrumbs::for('admin.users', function ($trail) {
    $trail->parent('admin.user_management');
    $trail->push(trans('admin.breadcrumb.users'), route('admin.users'));
});

// Admin User Create
Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.user_management');
    $trail->push(trans('admin.breadcrumb.user_create'), route('admin.users.create'));
});

// Admin User Show
Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->parent('admin.user_management');
    $trail->push($user->name, route('admin.users.show', $user));
});

// Admin User Edit
Breadcrumbs::for('admin.users.edit', function ($trail, $user) {
    $trail->parent('admin.users.show', $user);
    $trail->push(trans('admin.breadcrumb.user_edit'), route('admin.users.edit', $user));
});

// Admin Users Trash Can
Breadcrumbs::for('admin.users.trash', function ($trail) {
    $trail->parent('admin.user_management');
    $trail->push(trans('admin.breadcrumb.users_trash'), route('admin.users.trash'));
});
