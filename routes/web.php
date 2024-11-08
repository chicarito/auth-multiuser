<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\ManageUserController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;




Route::get('/', [AuthController::class, 'index'])->middleware(RedirectIfAuthenticated::class)->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/dashboard', [AdminController::class, 'index']);
Route::resource('/ManageUser', ManageUserController::class);
Route::post('/import', [ImportExcelController::class, 'import'])->name('import.excel');

