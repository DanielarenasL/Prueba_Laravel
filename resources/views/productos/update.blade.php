@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
            <h1>Editar producto</h1>

            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

                <label>Precio:</label>
                <input type="number" name="precio" value="{{ $producto->precio }}" min="1" required>


                <label>Stock:</label>
                <input type="number" name="stock" value="{{ $producto->stock }}" min="0" required>

                <button type="submit">Actualizar</button>
            </form>
        </body>
    </html>

