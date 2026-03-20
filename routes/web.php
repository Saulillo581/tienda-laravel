<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

// Ahora la página principal la maneja el Controlador
Route::get('/', [ProductoController::class, 'index']);
//la ruta que recibirá los datos
Route::post('/agregar-producto', [ProductoController::class, 'store']);
Route::delete('/eliminar-producto/{id}', [App\Http\Controllers\ProductoController::class, 'destroy']);
// Ruta para ver el formulario de editar
Route::get('/editar-producto/{id}', [App\Http\Controllers\ProductoController::class, 'edit']);

// Ruta para guardar los cambios (Usamos PUT para actualizar)
Route::put('/actualizar-producto/{id}', [App\Http\Controllers\ProductoController::class, 'update']);