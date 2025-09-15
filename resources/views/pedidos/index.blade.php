@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Pedidos</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="pedidos">
                <h1>Lista pedidos</h1>
                <table class="tablas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente->nombre }}</td>
                            <td>{{ $pedido->fecha }}</td>
                            <td>{{ $pedido->total }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button onclick="window.location = '{{ route('pedidos.create') }}'" class="btn-success">Crear pedido</button>
            </div>
        </body>
    </html>