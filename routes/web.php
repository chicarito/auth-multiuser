<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('dashboard.index');
// });
// Route::get('/asep', [AuthController::class, 'index'])->middleware(RedirectIfAuthenticated::class)->name('login');
// Route::post('/login', [AuthController::class, 'login']);


// Route::middleware(['auth'])->group(function () {
//     Route::get('/logout', [AuthController::class, 'logout']);
//     Route::get('/admin', [AdminController::class, 'index'])->middleware(UserAccess::class . ':admin');
//     Route::get('/karyawan', [AdminController::class, 'karyawan'])->middleware(UserAccess::class . ':karyawan');
// });

Route::get('/dashboard', [AdminController::class, 'index']);
Route::resource('/ManageUser', ManageUserController::class);