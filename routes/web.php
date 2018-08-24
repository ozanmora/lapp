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
