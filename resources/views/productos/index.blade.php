@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Productos</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="productos">
                <h1>Lista productos</h1>
                <table class="tablas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <form action="{{ route('productos.agregar', $producto->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="cantidad" min="1" placeholder="Cantidad" required>
                                    <button type="submit" class="btn-primary">Agregar stock</button>
                                </form>
                            </td>
                            <td>
                                <button onclick="window.location = '{{ route('productos.edit', $producto->id) }}'" class="btn-primary">Editar</button>
                            </td>
                            <td>
                                <form action="{{ route('productos.delete', $producto->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn-danger" onclick="return confirm('¿Seguro de que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button onclick="window.location = '{{ route('productos.create') }}'" class="btn-success">Crear producto</button>
            </div>
        </body>
    </html>