<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('index');})->middleware('auth')->name('index');

Route::get('/inventario', function () {return view('inventario.index');})->middleware('auth')->name('inventario');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/database', [App\Http\Controllers\ImportadorController::class, 'index'])->name('database');

Route::post('/database/importador', [App\Http\Controllers\ImportadorController::class, 'importar'])->name('database.importador');