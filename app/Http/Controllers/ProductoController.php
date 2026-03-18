<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index() {
        // Traemos todos los productos de la base de datos
        $productos = Producto::all();
        // Se los mandamos a la vista 'welcome'
        return view('welcome', compact('productos'));
    }

    public function store(Request $request) {
    // Guardamos el producto con lo que viene del formulario
    \App\Models\Producto::create($request->all());
    
    // Regresamos a la página principal
    return redirect('/');
    }

}
