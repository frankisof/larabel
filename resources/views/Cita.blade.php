@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; font-family: 'Arial', sans-serif; color: #333; background: url('cascada-rio-en-la-selva_3840x2160_xtrafondos.com.jpg') no-repeat center center; background-size: cover; padding: 150px; border-radius: 8px;">
    <h1 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Agenda de Citas</h1>
    <div class="mb-3" style="display: flex; justify-content: space-evenly; margin-bottom: 20px;">
        <a href="{{ route('citas.create') }}" class="btn btn-primary" style="background-color: #3498db; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Agregar Citas</a>
        <a href="{{ route('citas.search') }}" class="btn btn-primary" style="background-color: #3498db; border: none; padding: 10px 15px; color: #fff; text-transform: uppercase; border-radius: 5px; text-decoration: none;">Buscar Citas</a>
    </div>
    <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 20px; background-color: rgba(255, 255, 255, 0.9); color: #2c3e50; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #2c3e50; color: #ffffff; text-align: left;">
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Mascota</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Servicio</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Fecha</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Hora</th>
                <th style="padding: 15px; text-transform: uppercase; font-weight: bold; letter-spacing: 1px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($appointments as $appointment)
                <tr style="background-color: #ffffff; border-bottom: 1px solid #ddd; transition: background-color 0.3s;">
                    <td style="padding: 15px;">{{ $appointment->pet->name }}</td>
                    <td style="padding: 15px;">{{ $appointment->service->name }}</td>
                    <td style="padding: 15px;">{{ $appointment->date }}</td>
                    <td style="padding: 15px;">{{ $appointment->time }}</td>
                    <td style="padding: 15px; display: flex; gap: 10px;">
                        <a href="{{ route('citas.edit', $appointment->id) }}" class="btn btn-warning btn-sm" style="background-color: #f1c40f; color: #333; border: none; padding: 5px 15px; border-radius: 3px; text-decoration: none;">Editar</a>
                        <form action="{{ route('citas.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #e74c3c; color: #fff; border: none; padding: 5px 15px; border-radius: 3px;" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 15px; text-align: center; background-color: rgba(255, 255, 255, 0.7);">No hay citas disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
