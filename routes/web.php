<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceHistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManageUserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;




Route::get('/', [AuthController::class, 'index'])->middleware(RedirectIfAuthenticated::class)->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', UserAccess::class . ':admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('/manage-user', ManageUserController::class);
    Route::post('/import', [ImportExcelController::class, 'import'])->name('import.excel');
    Route::resource('/manage-location', LocationController::class);
});
Route::middleware(['auth', UserAccess::class . ':user'])->group(function () {
    Route::get('/user', [AdminController::class, 'user']);
});
