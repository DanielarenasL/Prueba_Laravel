@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 style="padding-top: 50px">Crear pedido</h1>

        <form action="{{ route('pedidos.save') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Id cliente:</label>
                <select name="cliente_id" class="form-control" required>
                    <option value=""> Selecciona un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }} - {{ $cliente->email }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Fecha:</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Total:</label>
                <input type="number" name="total" min="0" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-success">Crear</button>
        </form>
        <button class="btn btn-primary" onclick="window.location='{{ route('pedidos.index') }}'">Volver</button>

    </div>
    