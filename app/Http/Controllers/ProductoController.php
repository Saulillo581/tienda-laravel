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
        // Aquí es donde validamos:
        $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'required|numeric|min:0',
            'stock'  => 'required|integer|min:0',
        ]);

        // Si pasa la validación, se crea el producto
        \App\Models\Producto::create($request->all());
        return redirect('/')->with('mensaje', '¡Producto guardado con éxito!');
    }

    public function destroy($id) {
        // Busca el producto por su ID
        $producto = \App\Models\Producto::find($id);
        // Lo borra de la base de datos
        $producto->delete();
        // Te regresa a la página principal con un mensaje
        return redirect('/')->with('mensaje', 'Producto eliminado correctamente');
    }

    public function update(Request $request, $id) {
    // 1. Validamos los datos nuevos
    $request->validate([
        'nombre' => 'required|max:255',
        'precio' => 'required|numeric|min:0',
        'stock'  => 'required|integer|min:0',
    ]);

    // 2. Buscamos el producto y lo actualizamos
    $producto = Producto::find($id);
    $producto->update($request->all());

    // 3. Regresamos a la pantalla principal con un mensaje
    return redirect('/')->with('mensaje', '¡Producto actualizado correctamente!');
    }

}
