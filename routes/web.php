<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Frete\FreteController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/adicionar-frete', [FreteController::class, 'index'])->name('add.frete');
    Route::post('/adicionar-frete', [FreteController::class, 'create'])->name('add.frete.action');
    Route::post('/fretes-filter', [FreteController::class, 'getFretes'])->name('fretes.filter');
});

Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.action');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
