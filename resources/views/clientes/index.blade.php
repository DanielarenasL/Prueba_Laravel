@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Clientes</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="clientes">
                <h1>Lista de clientes</h1>
                <table class="tablas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Fecha_creacion</th>
                            <th>Fecha_modificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->created_at }}</td>
                                <td>{{ $cliente->updated_at }}</td>
                                <td>
                                    <form action="{{ route('clientes.delete', $cliente->id) }}" method="POST" style="display:inline;">
                                    @csrf    
                                    @method('DELETE')
                                        <button type="submit" class="btn-danger" onclick="return confirm('¿Seguro de que deseas eliminar este cliente?')">Eliminar</button>
                                    </form>
                                </td>
                                <td>
                                    <button onclick="window.location = '{{ route('clientes.edit', $cliente->id) }}'" class="btn-primary">Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button onclick="window.location = '{{ route('clientes.create') }}'" class="btn-success">Crear cliente</button>
            </div>
        </body>
    </html>