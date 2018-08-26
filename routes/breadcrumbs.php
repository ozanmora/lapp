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
    $trail->push(trans('admin.breadcrumb.list'), route('admin.users'));
});

// Admin User Create
Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.user_management');
    $trail->push(trans('admin.breadcrumb.create'), route('admin.users.create'));
});

// Admin User Show
Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->parent('admin.user_management');
    $trail->push($user->name, route('admin.users.show', $user));
});

// Admin User Edit
Breadcrumbs::for('admin.users.edit', function ($trail, $user) {
    $trail->parent('admin.users.show', $user);
    $trail->push(trans('admin.breadcrumb.edit'), route('admin.users.edit', $user));
});

// Admin Users Trash Can
Breadcrumbs::for('admin.users.trash', function ($trail) {
    $trail->parent('admin.user_management');
    $trail->push(trans('admin.breadcrumb.trash'), route('admin.users.trash'));
});

// Admin Role Management
Breadcrumbs::for('admin.role_management', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(trans('admin.breadcrumb.role_management'), route('admin.roles'));
});

// Admin Role List
Breadcrumbs::for('admin.roles', function ($trail) {
    $trail->parent('admin.role_management');
    $trail->push(trans('admin.breadcrumb.list'), route('admin.roles'));
});

// Admin Role Create
Breadcrumbs::for('admin.roles.create', function ($trail) {
    $trail->parent('admin.role_management');
    $trail->push(trans('admin.breadcrumb.create'), route('admin.roles.create'));
});

// Admin Role Show
Breadcrumbs::for('admin.roles.show', function ($trail, $role) {
    $trail->parent('admin.role_management');
    $trail->push($role->name, route('admin.roles.show', $role));
});

// Admin Role Edit
Breadcrumbs::for('admin.roles.edit', function ($trail, $role) {
    $trail->parent('admin.roles.show', $role);
    $trail->push(trans('admin.breadcrumb.edit'), route('admin.roles.edit', $role));
});
