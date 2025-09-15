<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi App</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <nav class="nav-container">
                <li><a href="{{ route('clientes.index') }}" class="nav-link">Clientes</a></li>
                <li><a href="{{ route('productos.index') }}" class="nav-link">Productos</a></li>
                <li><a href="{{ route('pedidos.index') }}" class="nav-link">Pedidos</a></li>
            </nav>
        </div>
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>