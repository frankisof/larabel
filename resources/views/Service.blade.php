@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Lista de Servicios</h1>
    <div class="mb-3" style="display: flex; justify-content: space-evenly; margin-bottom: 20px;">
        <a href="{{ route('service.create') }}" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Agregar Servicio</a>
        <a href="{{ route('service.search') }}" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Buscar Servicio</a>
    </div>
    <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px; background-color: rgba(255, 255, 255, 0.9); color: #2c3e50; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #2c3e50; color: #ffffff; text-align: left;">
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Nombre</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Descripción</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Precio</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr style="background-color: #ffffff; border-bottom: 1px solid #ddd; transition: background-color 0.3s;">
                    <td style="padding: 15px;">{{ $service->name }}</td>
                    <td style="padding: 15px;">{{ $service->description }}</td>
                    <td style="padding: 15px;">${{ number_format($service->price, 2) }}</td>
                    <td style="padding: 15px; display: flex; gap: 10px;">
                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning btn-sm" style="background-color: #f1c40f; color: #333; border: none; padding: 5px 15px; border-radius: 3px; text-decoration: none;">Editar</a>
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #e74c3c; color: #fff; border: none; padding: 5px 15px; border-radius: 3px;" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding: 15px; text-align: center; background-color: rgba(255, 255, 255, 0.7);">No hay servicios disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
