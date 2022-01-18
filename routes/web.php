<?php

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/adicionar-frete', [FreteController::class, 'index'])->name('add.frete');
Route::post('/adicionar-frete', [FreteController::class, 'create'])->name('add.frete.action');
