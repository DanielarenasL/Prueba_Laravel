<?php

use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;



//* -------------------------Rutas para Cliente-----------------------------

//* GET
Route::get('/clientes', [ClienteController::class, 'get_clientes'])->name('clientes.index');

//* Create
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/save', [ClienteController::class, 'save'])->name('clientes.save');

//* Delete
Route::delete('/clientes/delete/{id}', [ClienteController::class, 'delete'])->name('clientes.delete');

//* Update
Route::get('clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->name('clientes.update');


//* Get by ID
Route::get('/clientes/{id}', [ClienteController::class, 'get_ByID'])->name('clientes.get_ByID');

//* ------------------------Rutas para Producto-------------------------

//* GET
Route::get('/productos', [ProductoController::class, 'get'])->name('productos.index');

//* Create
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/save', [ProductoController::class, 'save'])->name('productos.save');

//* Delete
Route::delete('/productos/delete/{id}', [ProductoController::class, 'delete'])->name('productos.delete');

//* Agregar stock
Route::put('productos/agregar/{id}', [ProductoController::class, 'agregar'])->name('productos.agregar');

//* Update
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/update/{id}', [ProductoController::class, 'update'])->name('productos.update');


//* ---------------------------------Rutas para pedido----------------------


//* GET
Route::get('/pedidos', [PedidoController::class, 'get'])->name('pedidos.index');

//* Create
Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos/save', [PedidoController::class, 'save'])->name('pedidos.save');