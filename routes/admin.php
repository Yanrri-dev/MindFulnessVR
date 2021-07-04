<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SceneController;

Route::middleware(['auth:sanctum', 'verified'])->get('', [DashboardController::class, 'index'] )->name('admin.dashboard');


Route::resource('users', UserController::class)->names('admin.users');

Route::resource('scenes', SceneController::class)->names('admin.scenes');
