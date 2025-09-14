<?php

use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

//* Rutas para Cliente
Route::get('/clientes', [ClienteController::class, 'get_clientes'])->name('clientes.index');
Route::get('/clientes/{id}', [ClienteController::class, 'get_ByID'])->name('clientes.get_ByID');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/save', [ClienteController::class, 'save'])->name('clientes.save');
Route::delete('/clientes/delete/{id}', [ClienteController::class, 'delete'])->name('clientes.delete');
Route::put('/clientes/update', [ClienteController::class, 'update'])->name('clientes.update');