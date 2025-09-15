@extends('layouts.app')

@section('content')
    <div class="form-container fade-in">
        <h1>Editar usuario</h1>

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="{{ $cliente->email }}" required>
            </div>

            <div class="form-group">
                <label>Teléfono:</label>
                <input type="number" name="telefono" value="{{ $cliente->telefono }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
        </form>
    </div>
@endsection
