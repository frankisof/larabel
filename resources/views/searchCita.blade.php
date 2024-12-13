@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Buscar Citas</h2>
    
    <form action="{{ route('citas.search') }}" method="GET" class="mb-4">
        <input type="text" name="query" class="form-control" placeholder="Buscar por nombre de mascota o servicio" required>
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    @if(isset($appointments) && $appointments->isNotEmpty())
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Mascota</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->pet->name }}</td>
                        <td>{{ $appointment->service->name }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron resultados.</p>
    @endif
</div>

<!-- CSS -->
<style>
    .container {
        margin-top: 20px;
        font-family: 'Arial', sans-serif;
        color: #f7f1f1;
    }

    .text-center {
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .btn {
        padding: 10px 20px;
        color: #fff;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #5a8d44;
        border: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        color: #2c3e50;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        overflow: hidden;
    }

    thead {
        background-color: #2c3e50;
        color: #ffffff;
        text-align: left;
    }

    th, td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    tr:hover {
        background-color: #f9f9f9;
    }
</style>
@endsection
