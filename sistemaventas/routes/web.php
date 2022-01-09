<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\VentaController;
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
Route::resource('almacen/categoria',CategoriaController::class);
Route::resource('almacen/articulo', ArticuloController::class);
Route::resource('ventas/cliente', ClienteController::class);
Route::resource('compras/proveedor', ProveedorController::class);
Route::resource('compras/ingreso', IngresoController::class);
Route::resource('ventas/venta',VentaController::class);