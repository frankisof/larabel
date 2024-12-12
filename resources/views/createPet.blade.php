@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; font-family: 'Arial', sans-serif; color: #333; background: url('cascada-rio-en-la-selva_3840x2160_xtrafondos.com.jpg') no-repeat center center; background-size: cover; padding: 150px; border-radius: 8px;">
    <h2 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Crear nueva mascota</h2>
    <form action="{{ route('pets.store') }}" method="POST" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        @csrf <!-- Para proteger contra ataques CSRF -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold; margin-bottom: 5px; display: block;">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="breed" style="font-weight: bold; margin-bottom: 5px; display: block;">Raza:</label>
            <input type="text" class="form-control" id="breed" name="breed" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="age" style="font-weight: bold; margin-bottom: 5px; display: block;">Edad:</label>
            <input type="number" class="form-control" id="age" name="age" min="0" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
            <label for="type" style="font-weight: bold; margin-bottom: 5px; display: block;">Tipo:</label>
            <select class="form-control" id="type" name="type" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
                <option value="undefined">Indefinido</option>
                <option value="dog">Perro</option>
                <option value="cat">Gato</option>
                <!-- Añadir más opciones según tus necesidades -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 20px; color: #fff; text-transform: uppercase; border-radius: 5px; cursor: pointer;">Crear</button>
    </form>
</div>
@endsection
