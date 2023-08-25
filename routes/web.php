<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionManagement;
use App\Http\Controllers\Admin\RoleManagement;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Admin\UserSoftDelete;

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
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // Profile Management Routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');

    // User Management Routes
    Route::get('/admin/users', [UserManagement::class, 'index'])->name('admin.users')->middleware('permission:users.list');
    Route::get('/admin/users/show/{id}', [UserManagement::class, 'show'])->name('admin.users.view')->middleware(['permission:users.view']);
    Route::get('/admin/users/create', [UserManagement::class, 'create'])->name('admin.users.create')->middleware(['permission:users.create']);
    Route::post('/admin/users/store', [UserManagement::class, 'store'])->name('admin.users.store')->middleware(['permission:users.create']);
    Route::get('/admin/users/edit/{id}', [UserManagement::class, 'edit'])->name('admin.users.edit')->middleware(['permission:users.edit']);
    Route::put('/admin/users/update/{id}', [UserManagement::class, 'update'])->name('admin.users.update')->middleware(['permission:users.edit']);
    Route::put('/admin/users/detach/{user_id}/{model}/{id}', [UserManagement::class, 'detach'])->name('admin.users.detach')->middleware(['permission:users.edit']);
    Route::delete('/admin/users/delete/{id}', [UserManagement::class, 'destroy'])->name('admin.users.delete')->middleware(['permission:users.delete']);
    Route::get('/admin/users/trash', [UserSoftDelete::class, 'index'])->name('admin.users.trash')->middleware(['role:root']);
    Route::put('/admin/users/restore/{id}', [UserSoftDelete::class, 'update'])->name('admin.users.restore')->middleware(['role:root']);
    Route::delete('/admin/users/destroy/{id}', [UserSoftDelete::class, 'destroy'])->name('admin.users.destroy')->middleware(['role:root']);

    Route::group(['middleware' => ['role:root']], function () {
        // Role Management Routes
        Route::get('/admin/roles', [RoleManagement::class, 'index'])->name('admin.roles');
        Route::get('/admin/roles/show/{id}', [RoleManagement::class, 'show'])->name('admin.roles.show');
        Route::get('/admin/roles/create', [RoleManagement::class, 'create'])->name('admin.roles.create');
        Route::post('/admin/roles/store', [RoleManagement::class, 'store'])->name('admin.roles.store');
        Route::get('/admin/roles/edit/{id}', [RoleManagement::class, 'edit'])->name('admin.roles.edit');
        Route::put('/admin/roles/update/{id}', [RoleManagement::class, 'update'])->name('admin.roles.update');
        Route::put('/admin/roles/detach/{role_id}/{model}/{id}', [RoleManagement::class, 'detach'])->name('admin.roles.detach');
        Route::delete('/admin/roles/delete/{id}', [RoleManagement::class, 'destroy'])->name('admin.roles.destroy');

        // Permission Management Routes
        Route::get('/admin/permissions', [PermissionManagement::class, 'index'])->name('admin.permissions');
        Route::get('/admin/permissions/show/{id}', [PermissionManagement::class, 'show'])->name('admin.permissions.show');
        Route::get('/admin/permissions/create', [PermissionManagement::class, 'create'])->name('admin.permissions.create');
        Route::post('/admin/permissions/store', [PermissionManagement::class, 'store'])->name('admin.permissions.store');
        Route::get('/admin/permissions/edit/{id}', [PermissionManagement::class, 'edit'])->name('admin.permissions.edit');
        Route::put('/admin/permissions/update/{id}', [PermissionManagement::class, 'update'])->name('admin.permissions.update');
        Route::put('/admin/permissions/detach/{permission_id}/{model}/{id}', [PermissionManagement::class, 'detach'])->name('admin.permissions.detach');
        Route::delete('/admin/permissions/delete/{id}', [PermissionManagement::class, 'destroy'])->name('admin.permissions.destroy');
    });

});
