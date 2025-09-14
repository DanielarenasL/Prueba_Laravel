<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //* Obtener todos los clientes
    public function get_clientes(){
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    //* Obtener cliente por id
    public function get_ByID($id){
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        }
        return view('clientes.show', compact('cliente'));
    }

    //* Crear cliente
    public function create() {
        return view('clientes.create');
    }

    //* Guardar cliente
    public function save(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'telefono' => 'required|numeric'
        ]);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    //* Eliminar cliente
    public function delete($id){
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }


    //* Actualizar cliente
    public function update_client(Request $request) {
        $request->validate([
            'id' => 'required|numeric',
            'nombre' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'telefono' => 'required|numeric'
        ]);

        $cliente = Cliente::find($request->id);

        if (!$cliente) {
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
        }

        $cliente->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono    
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }
}