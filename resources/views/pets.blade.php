@extends('layouts.app')

@section('content')
<div class="container" >
    <h1 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Lista de Mascotas</h1>
    <div class="mb-3" style="display: flex; justify-content: space-evenly; margin-bottom: 20px;">
        <a href="{{ route('pets.createPet') }}" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Agregar Mascota</a>
        <a href="{{ route('pets.search') }}" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Buscar Mascota</a>
    </div>
    <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px; background-color: rgba(255, 255, 255, 0.9); color: #1b3a36; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #1b3a36; color: #ffffff; text-align: left;">
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Nombre</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Raza</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Edad</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Tipo</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
                <tr style="background-color: #ffffff; border-bottom: 1px solid #ddd; transition: background-color 0.3s;">
                    <td style="padding: 15px;">{{ $pet->name }}</td>
                    <td style="padding: 15px;">{{ $pet->breed }}</td>
                    <td style="padding: 15px;">{{ $pet->age }}</td>
                    <td style="padding: 15px;">{{ $pet->type ?? 'No especificado' }}</td>
                    <td style="padding: 15px; display: flex; gap: 10px;">
                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning btn-sm" style="background-color: #f1c40f; color: #333; border: none; padding: 5px 15px; border-radius: 3px; text-decoration: none;">Editar</a>
                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #e74c3c; color: #fff; border: none; padding: 5px 15px; border-radius: 3px;" onclick="return confirm('¿Estás seguro de que deseas eliminar esta mascota?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
