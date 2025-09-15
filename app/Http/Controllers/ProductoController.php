<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class ProductoController extends Controller
{
    //? Funcional
    //* Obtener todos los productos
    public function get() {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    //* Obtener producto por id
    public function get_ByID($id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }
        return view('productos.show', compact('producto'));
    }

    //? Funcional
    //* Crear producto
    public function create() {
        return view('productos.create');
    }

    //? Funcional
    //* Guardar producto
    public function save(Request $request) {
        $request-> validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    //? Funcional
    //* Eliminar producto
    public function delete($id) {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');

    }

    //* Agregar stock
    public function agregar($id, Request $request) {
        $request-> validate([
            'cantidad' => 'required|numeric|min:1'
        ]);

        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
        }

        $producto->stock += $request->cantidad;

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Stock agregado correctamente');
    }

}
