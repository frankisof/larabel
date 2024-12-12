@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; font-family: 'Arial', sans-serif; color: #333; background: url('cascada-rio-en-la-selva_3840x2160_xtrafondos.com.jpg') no-repeat center center; background-size: cover; padding: 150px; border-radius: 8px;">
    <h2 style="text-align: center; color: #ffffff; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Buscar Mascota</h2>
    <form action="{{ route('pets.search') }}" method="GET" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold; margin-bottom: 5px; display: block;">Nombre de la mascota:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Introduce el nombre de la mascota" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #5a8d44; border: none; padding: 10px 20px; color: #fff; text-transform: uppercase; border-radius: 5px; cursor: pointer;">Buscar</button>
    </form>

    @if(isset($pets) && $pets->isNotEmpty())
    <div style="margin-top: 30px; background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <h3 style="text-align: center; color: #333; font-weight: bold; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">Resultados de la búsqueda</h3>
        <table class="table" style="width: 100%; margin-top: 15px; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #5a8d44; color: #fff; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ccc;">Nombre</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ccc;">Raza</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ccc;">Edad</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ccc;">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                <tr style="background-color: rgba(90, 141, 68, 0.1);">
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $pet->name }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $pet->breed }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $pet->age }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ccc;">{{ $pet->type ?? 'No especificado' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @elseif(isset($pets))
    <h3 style="text-align: center; color: red; margin-top: 30px;">No se encontraron mascotas con ese nombre</h3>
    @endif
</div>
@endsection
