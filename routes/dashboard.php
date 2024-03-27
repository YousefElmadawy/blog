<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboradContrloller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboradContrloller::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('dashboard/permissions', PermissionController::class);

    Route::resource('dashboard/roles', RoleController::class);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('addPermission');
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('givePermission');

    Route::resource('dashboard/users', UserController::class);
    Route::resource('dashboard/categories', CategoryController::class);
    Route::resource('dashboard/posts', PostController::class);
    Route::resource('dashboard/tags', TagController::class);
    Route::resource('dashboard/comments', CommentController::class);
});
require __DIR__.'/auth.php';