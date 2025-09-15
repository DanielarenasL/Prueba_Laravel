@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 style="padding-top: 50px">Crear producto</h1>

        <form action="{{ route('productos.save') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control">  
            </div>

            <div class="form-group">
                <label class="form-label">Precio:</label>
                <input type="number" name="precio" min="1" class="form-control">
            </div>
            

            <div class="form-group">
                <label class="form-label">Stock:</label>
                <input type="number" name="stock" min="0" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-success">Crear</button>
        </form>
        <button class="btn btn-primary" onclick="window.location='{{ route('productos.index') }}'">Volver</button>

    </div>
    