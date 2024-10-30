<?php

use App\Http\Controllers\ActivoController;
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

// Route::get('/', function () {return view('index');})->middleware('auth')->name('index');

Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index')->middleware('auth');

Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/database', [App\Http\Controllers\ImportadorController::class, 'index'])->name('database')->middleware('auth');

Route::get('/inventario', [App\Http\Controllers\ActivoController::class, 'index'])->name('inventario.index')->middleware('auth');

Route::post('/database/importador', [App\Http\Controllers\ImportadorController::class, 'importar'])->name('database.importador')->middleware('auth');

Route::get('/progreso', [App\Http\Controllers\ImportadorController::class, 'getProgress'])->name('database.getProgress');

Route::get('/inventario/{numero}', [App\Http\Controllers\ActivoController::class, 'infoActivo'])->name('inventario')->middleware('auth');

Route::put('/inventario/guardar', [App\Http\Controllers\ActivoController::class, 'update'])->name('inventario.save');

Route::get('/historial/{numero_de_activo}', [App\Http\Controllers\ActivoController::class, 'show']);

Route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/reportes', [App\Http\Controllers\ReportesController::class, 'index'])->name('reportes')->middleware('auth');