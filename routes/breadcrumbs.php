<?php

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(trans('admin.dashboard.breadcrumb_title'), route('admin'));
});
