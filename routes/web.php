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

Route::get('/database/progreso', [App\Http\Controllers\ImportadorController::class, 'obtenerProgreso'])->name('database.progreso');

Route::get('/inventario/{numero}', [App\Http\Controllers\ActivoController::class, 'infoActivo'])->name('inventario')->middleware('auth');

Route::put('/inventario/guardar', [App\Http\Controllers\ActivoController::class, 'update'])->name('inventario.save');

Route::get('/historial/{numero_de_activo}', [App\Http\Controllers\ActivoController::class, 'show'])->name('historial')->middleware('auth');

Route::resource('/usuarios',\App\Http\Controllers\UserController::class)->middleware(['auth', 'can:usuarios']);

Route::get('/reportes', [App\Http\Controllers\ReportesController::class, 'index'])->name('reportes')->middleware('auth');

Route::get('/reportes/descargapdf', [App\Http\Controllers\ReportesController::class, 'reportes'])->name('reportes.pdf')->middleware('auth');

Route::get('/reportes/descargaxlsx', [App\Http\Controllers\ReportesController::class, 'excel'])->name('reportes.excel')->middleware('auth');