<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;


class PedidoController extends Controller
{
    //* Obtener todos los productos
    public function get() {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }


    //* Crear pedido
    public function create() {
        $clientes = Cliente::select('id', 'nombre', 'email')->orderBy('nombre')->get();

        return view('pedidos.create', compact('clientes'));
    }

    //* Guardar pedido
    public function save(Request $request) {
        $request-> validate([
            'cliente_id' => 'required|numeric',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:1'
        ]);


        $pedido = Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente');
    }
}
