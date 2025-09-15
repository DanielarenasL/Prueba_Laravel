@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalle Pedido</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>
        <body>
            <div class="pedido">
                <h1>Detalle del Pedido #{{ $pedido->id }}</h1>

                <div class="card">
                    <h3>Cliente</h3>
                    <p><strong>Nombre:</strong> {{ $pedido->cliente->nombre }}</p>
                    <p><strong>Email:</strong> {{ $pedido->cliente->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $pedido->cliente->telefono }}</p>
                </div>

                <div class="card">
                    <h3>Información del Pedido</h3>
                    <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
                    <p><strong>Total:</strong> ${{ number_format($pedido->total, 0, ',', '.') }}</p>
                </div>

                <h2>Productos del pedido</h2>
                <table class="tablas">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->id }}</td>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                            <td>${{ number_format($detalle->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <button onclick="window.location = '{{ route('pedidos.index') }}'" class="btn-secondary">Volver</button>
            </div>
        </body>
    </html>

@endsection
