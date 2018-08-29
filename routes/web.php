<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'level:2']], function () {
    // Dashboard Routes
    Route::get('/admin', 'Admin\DashboardController@index')->name('admin');

    // Profile Management Routes
    Route::get('/profile', 'Admin\DashboardController@profile')->name('profile');
    Route::get('/admin/profile', 'Admin\DashboardController@profile')->name('admin.profile');

    // User Management Routes
    Route::get('/admin/users', 'Admin\UserManagement@index')->name('admin.users')->middleware(['role:root|permission:users.list']);
    Route::get('/admin/users/show/{id}', 'Admin\UserManagement@show')->name('admin.users.show')->middleware(['role:root|permission:users.show']);
    Route::get('/admin/users/create', 'Admin\UserManagement@create')->name('admin.users.create')->middleware(['role:root|permission:users.create']);
    Route::post('/admin/users/store', 'Admin\UserManagement@store')->middleware(['role:root|permission:users.create']);
    Route::get('/admin/users/edit/{id}', 'Admin\UserManagement@edit')->name('admin.users.edit')->middleware(['role:root|permission:users.edit']);
    Route::put('/admin/users/update/{id}', 'Admin\UserManagement@update')->middleware(['role:root|permission:users.edit']);
    Route::put('/admin/users/detach/{user_id}/{model}/{id}', 'Admin\UserManagement@detach')->middleware(['role:root|permission:users.edit']);
    Route::delete('/admin/users/delete/{id}', 'Admin\UserManagement@destroy')->middleware(['role:root|permission:users.delete']);
    Route::get('/admin/users/trash', 'Admin\UserSoftDelete@index')->name('admin.users.trash')->middleware(['role:root']);
    Route::put('/admin/users/restore/{id}', 'Admin\UserSoftDelete@update')->middleware(['role:root']);
    Route::delete('/admin/users/destroy/{id}', 'Admin\UserSoftDelete@destroy')->middleware(['role:root']);
});

Route::group(['middleware' => ['auth', 'role:root']], function () {
    // Role Management Routes
    Route::get('/admin/roles', 'Admin\RoleManagement@index')->name('admin.roles');
    Route::get('/admin/roles/show/{id}', 'Admin\RoleManagement@show')->name('admin.roles.show');
    Route::get('/admin/roles/create', 'Admin\RoleManagement@create')->name('admin.roles.create');
    Route::post('/admin/roles/store', 'Admin\RoleManagement@store');
    Route::get('/admin/roles/edit/{id}', 'Admin\RoleManagement@edit')->name('admin.roles.edit');
    Route::put('/admin/roles/update/{id}', 'Admin\RoleManagement@update');
    Route::put('/admin/roles/detach/{role_id}/{model}/{id}', 'Admin\RoleManagement@detach');
    Route::delete('/admin/roles/delete/{id}', 'Admin\RoleManagement@destroy');

    // Permission Management Routes
    Route::get('/admin/permissions', 'Admin\PermissionManagement@index')->name('admin.permissions');
    Route::get('/admin/permissions/show/{id}', 'Admin\PermissionManagement@show')->name('admin.permissions.show');
    Route::get('/admin/permissions/create', 'Admin\PermissionManagement@create')->name('admin.permissions.create');
    Route::post('/admin/permissions/store', 'Admin\PermissionManagement@store');
    Route::get('/admin/permissions/edit/{id}', 'Admin\PermissionManagement@edit')->name('admin.permissions.edit');
    Route::put('/admin/permissions/update/{id}', 'Admin\PermissionManagement@update');
    Route::put('/admin/permissions/detach/{permission_id}/{model}/{id}', 'Admin\PermissionManagement@detach');
    Route::delete('/admin/permissions/delete/{id}', 'Admin\PermissionManagement@destroy');
});
