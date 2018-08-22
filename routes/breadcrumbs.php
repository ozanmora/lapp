<?php

// Admin Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(trans('admin.breadcrumb.dashboard'), route('admin'));
});
