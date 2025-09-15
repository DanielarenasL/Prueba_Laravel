@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 style="padding-top: 50px">Crear pedido</h1>

        <form action="{{ route('pedidos.save') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Id cliente:</label>
                <select name="cliente_id" class="form-control" required>
                    <option value="">Selecciona un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} - {{ $cliente->email }}</option>
                    @endforeach
                </select>
            </div>

            <div class="productos-container">
                <div class="producto">
                    <div class="form-group">
                        <label class="form-label">Producto:</label>
                        <select name="producto_id[]" class="form-control producto-select" required>
                            <option value="">Selecciona un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}" data-stock="{{ $producto->stock }}">
                                    {{ $producto->nombre }} - Stock: {{ $producto->stock }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Cantidad</label>
                        <input type="number" min="1" name="cantidad[]" class="form-control cantidad-input" value="1">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Precio unitario: <span class="precio-unitario">0</span></label>
                        <input type="hidden" name="precio_unitario[]" class="precio-unitario-hidden" value="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Subtotal: <span class="subtotal">0</span></label>
                        <input type="hidden" name="subtotal[]" class="subtotal-hidden" value="0">
                    </div>
                </div>
            </div>

            <button class="btn btn-success" type="button" id="addProduct">Agregar otro producto</button>

            <div class="form-group">
                <label class="form-label">Fecha:</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Total: <span id="total">0</span></label>
                <input type="hidden" name="total" id="total-hidden" value="0">
            </div>

            <button type="submit" class="btn btn-success">Crear</button>
        </form>

        <button class="btn btn-primary" onclick="window.location='{{ route('pedidos.index') }}'">Volver</button>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnAgregar = document.querySelector('#addProduct');
        const contenedor = document.querySelector('.producto');
        const productosContainer = document.querySelector('.productos-container');
        const totalSpan = document.getElementById('total');
        const totalHidden = document.getElementById('total-hidden');

        function actualizarProducto(product) {
            const select = product.querySelector('.producto-select');
            const cantidadInput = product.querySelector('.cantidad-input');
            const precioUnitarioSpan = product.querySelector('.precio-unitario');
            const subtotalSpan = product.querySelector('.subtotal');
            const precioUnitarioHidden = product.querySelector('.precio-unitario-hidden');
            const subtotalHidden = product.querySelector('.subtotal-hidden');

            let precio = parseInt(select.options[select.selectedIndex]?.dataset.precio) || 0;
            let stock = parseInt(select.options[select.selectedIndex]?.dataset.stock) || 0;
            let cantidad = parseInt(cantidadInput.value) || 0;

            if(cantidad > stock) {
                cantidad = stock;
                cantidadInput.value = stock;
            }

            let subtotal = precio * cantidad;

            precioUnitarioSpan.textContent = precio;
            subtotalSpan.textContent = subtotal;
            precioUnitarioHidden.value = precio;
            subtotalHidden.value = subtotal;
        }

        function calcularTotal() {
            let total = 0;
            const productos = document.querySelectorAll('.producto');
            productos.forEach(product => {
                actualizarProducto(product);
                total += parseInt(product.querySelector('.subtotal-hidden').value) || 0;
            });

            totalSpan.textContent = total;
            totalHidden.value = total;
        }

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('cantidad-input') || e.target.classList.contains('producto-select')) {
                calcularTotal();
            }
        });

        btnAgregar.addEventListener('click', function () {
            const nuevoProducto = contenedor.cloneNode(true);
            nuevoProducto.querySelector('select').value = '';
            nuevoProducto.querySelector('input.cantidad-input').value = 1;
            nuevoProducto.querySelector('.precio-unitario').textContent = '0';
            nuevoProducto.querySelector('.subtotal').textContent = '0';
            nuevoProducto.querySelector('.precio-unitario-hidden').value = '0';
            nuevoProducto.querySelector('.subtotal-hidden').value = '0';
            productosContainer.appendChild(nuevoProducto);
        });

        calcularTotal();
    });
    </script>
@endsection
