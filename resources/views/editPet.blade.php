<!-- resources/views/editPet.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Mascota</h2>
    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Especifica que es una actualización con PUT -->
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}" required>
        </div>
        <div class="form-group">
            <label for="breed">Raza:</label>
            <input type="text" class="form-control" id="breed" name="breed" value="{{ $pet->breed }}" required>
        </div>
        <div class="form-group">
            <label for="age">Edad:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $pet->age }}" min="0" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $pet->type }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
