@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <h1>Editar usuario</h1>

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>

                <label>Email:</label>
                <input type="text" name="email" value="{{ $cliente->email }}" required>


                <label>Telefono:</label>
                <input type="number" name="telefono" value="{{ $cliente->telefono }}" required>

                <button type="submit">Actualizar</button>
            </form>
        </body>
    </html>

