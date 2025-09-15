<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\Cliente;
use App\Models\Producto;



class PedidoController extends Controller
{
    //* Obtener todos los pedidos
    public function get() {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    //* 
    public function get_detalle($id) {
        $pedido = Pedido::with(['cliente', 'detalles.producto'])->findOrFail($id);
        return view('pedidos.detalle', compact('pedido'));
    }


    //* Crear pedido
    public function create() {
        $clientes = Cliente::select('id', 'nombre', 'email')->orderBy('nombre')->get();
        $productos = Producto::select('id', 'nombre', 'precio', 'stock')->orderBy('nombre')->get();

        return view('pedidos.create', compact('clientes', 'productos'));
    }

    //* Guardar pedido
    public function save(Request $request) {
        // Validación del pedido
        $request->validate([
            'cliente_id' => 'required|numeric',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:1'
        ]);

        // Crear el pedido principal
        $pedido = Pedido::create($request->only('cliente_id', 'fecha', 'total'));
        $pedido_id = $pedido->id;

        // Validación de los productos
        $request->validate([
            'producto_id' => 'required|array|min:1',
            'producto_id.*' => 'required|numeric',
            'cantidad' => 'required|array|min:1',
            'cantidad.*' => 'required|numeric|min:1',
            'precio_unitario' => 'required|array|min:1',
            'precio_unitario.*' => 'required|numeric|min:1',
            'subtotal' => 'required|array|min:1',
            'subtotal.*' => 'required|numeric|min:1'
        ]);

        // Guardar cada producto en PedidoDetalle y descontar stock
        foreach($request->producto_id as $index => $producto_id) {
            $cantidad = $request->cantidad[$index];

            // Crear detalle del pedido
            PedidoDetalle::create([
                'pedido_id' => $pedido_id,
                'producto_id' => $producto_id,
                'cantidad' => $cantidad,
                'precio_unitario' => $request->precio_unitario[$index],
                'subtotal' => $request->subtotal[$index]
            ]);

            // Descontar stock del producto
            $producto = Producto::find($producto_id);
            if ($producto) {
                $producto->stock -= $cantidad;
                if ($producto->stock < 0) $producto->stock = 0; // prevenir stock negativo
                $producto->save();
            }
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente');
    }


}
