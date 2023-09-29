<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\GetUserController;
use App\Http\Controllers\GetUsersController;
use App\Http\Controllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/users', CreateUserController::class)->name('users.create');
Route::patch('/users/{id?}', UpdateUserController::class)->name('users.update');
Route::get('/users', GetUsersController::class)->name('users.get');
Route::get('/users/{id?}', GetUserController::class)->name('user.get');
Route::delete('/users/{id?}', DeleteUserController::class)->name('user.delete');
