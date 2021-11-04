<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductsController::class, 'index'])->middleware('guest');

Route::get('/login', [AuthController::class, 'show_login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');

Route::get('/logout', [AuthController::class, 'index'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DahsboardController::class, 'index'])->middleware('auth')->name('dashboard');

