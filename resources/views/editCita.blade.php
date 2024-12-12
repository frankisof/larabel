@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; font-family: 'Arial', sans-serif; color: #333; background: url('cascada-rio-en-la-selva_3840x2160_xtrafondos.com.jpg') no-repeat center center; background-size: cover; padding: 150px; border-radius: 8px;">
    <h2 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Editar Cita</h2>
    <form action="{{ route('citas.update', $appointment->id) }}" method="POST" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="pet_id" style="font-weight: bold; margin-bottom: 5px; display: block;">Mascota:</label>
            <select name="pet_id" id="pet_id" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $appointment->pet_id == $pet->id ? 'selected' : '' }}>{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="service_id" style="font-weight: bold; margin-bottom: 5px; display: block;">Servicio:</label>
            <select name="service_id" id="service_id" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $appointment->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="date" style="font-weight: bold; margin-bottom: 5px; display: block;">Fecha:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="time" style="font-weight: bold; margin-bottom: 5px; display: block;">Hora:</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 20px; color: #fff; text-transform: uppercase; border-radius: 5px; cursor: pointer;">Actualizar Cita</button>
    </form>
</div>
@endsection
