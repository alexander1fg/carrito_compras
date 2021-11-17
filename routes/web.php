<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/edit/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/update/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}', [ProductosController::class, 'delete'])->name('productos.delete');

Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentasController::class, 'create'])->name('ventas.create');
Route::post('/ventas/store', [VentasController::class, 'store'])->name('ventas.store');
Route::get('/ventas/edit/{id}', [VentasController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/update/{id}', [VentasController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/delete/{id}', [VentasController::class, 'delete'])->name('ventas.delete');