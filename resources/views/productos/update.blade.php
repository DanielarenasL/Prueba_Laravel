@extends('layouts.app')

@section('content')
    <div class="form-container fade-in">
        <h1>Editar producto</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
            </div>

            <div class="form-group">
                <label>Precio:</label>
                <input type="number" name="precio" value="{{ $producto->precio }}" min="1" required>
            </div>

            <div class="form-group">
                <label>Stock:</label>
                <input type="number" name="stock" value="{{ $producto->stock }}" min="0" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>
    </div>
@endsection
