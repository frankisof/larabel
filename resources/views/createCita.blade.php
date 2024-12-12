@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; font-family: 'Arial', sans-serif; color: #333; background: url('cascada-rio-en-la-selva_3840x2160_xtrafondos.com.jpg') no-repeat center center; background-size: cover; padding: 150px; border-radius: 8px;">
    <h2 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Agendar Nueva Cita</h2>
    <form action="{{ route('citas.store') }}" method="POST" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        @csrf <!-- Para proteger contra ataques CSRF -->
        
        <!-- Selección de la mascota -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="pet_id" style="font-weight: bold; margin-bottom: 5px; display: block;">Mascota:</label>
            <select class="form-control" id="pet_id" name="pet_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
                <option value="" disabled selected>Selecciona una mascota</option>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Selección del servicio -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="service_id" style="font-weight: bold; margin-bottom: 5px; display: block;">Servicio:</label>
            <select class="form-control" id="service_id" name="service_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
                <option value="" disabled selected>Selecciona un servicio</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para la fecha -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="date" style="font-weight: bold; margin-bottom: 5px; display: block;">Fecha:</label>
            <input type="date" class="form-control" id="date" name="date" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>

        <!-- Campo para la hora -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="time" style="font-weight: bold; margin-bottom: 5px; display: block;">Hora:</label>
            <input type="time" class="form-control" id="time" name="time" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 20px; color: #fff; text-transform: uppercase; border-radius: 5px; cursor: pointer;">Guardar Cita</button>
    </form>
</div>
@endsection
