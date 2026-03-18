<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

// Ahora la página principal la maneja el Controlador
Route::get('/', [ProductoController::class, 'index']);
//la ruta que recibirá los datos
Route::post('/agregar-producto', [ProductoController::class, 'store']);