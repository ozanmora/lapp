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

Route::get('/admin', 'Admin\DashboardController@index')->name('admin');
Route::get('/profile', 'Admin\DashboardController@profile')->name('profile');
Route::get('/admin/profile', 'Admin\DashboardController@profile')->name('admin.profile');

// User Management Routes
Route::get('/admin/users', 'Admin\UserManagement@index')->name('admin.users');
Route::get('/admin/users/show/{id}', 'Admin\UserManagement@show')->name('admin.users.show');
Route::get('/admin/users/create', 'Admin\UserManagement@create')->name('admin.users.create');
Route::post('/admin/users/store', 'Admin\UserManagement@store');
Route::get('/admin/users/edit/{id}', 'Admin\UserManagement@edit')->name('admin.users.edit');
Route::put('/admin/users/update/{id}', 'Admin\UserManagement@update');
Route::delete('/admin/users/delete/{id}', 'Admin\UserManagement@destroy');
Route::get('/admin/users/trash', 'Admin\UserSoftDelete@index')->name('admin.users.trash');
Route::put('/admin/users/restore/{id}', 'Admin\UserSoftDelete@update');
Route::delete('/admin/users/destroy/{id}', 'Admin\UserSoftDelete@destroy');

// User Management Routes
Route::get('/admin/roles', 'Admin\RoleManagement@index')->name('admin.roles');
Route::get('/admin/roles/show/{id}', 'Admin\RoleManagement@show')->name('admin.roles.show');
Route::get('/admin/roles/create', 'Admin\RoleManagement@create')->name('admin.roles.create');
Route::post('/admin/roles/store', 'Admin\RoleManagement@store');
Route::get('/admin/roles/edit/{id}', 'Admin\RoleManagement@edit')->name('admin.roles.edit');
Route::put('/admin/roles/update/{id}', 'Admin\RoleManagement@update');
Route::delete('/admin/roles/delete/{id}', 'Admin\RoleManagement@destroy');
