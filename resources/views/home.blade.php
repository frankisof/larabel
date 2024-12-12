@extends('layouts.app')

@section('content')
<div class="vintage-background">
    <header class="vintage-header text-center">
        <h1 class="display-4">Clínica Veterinaria PetCare</h1>
        <p class="lead">Cuidado con amor y excelencia desde 1998</p>
    </header>

    <!-- Menús debajo del header -->
    <nav class="menu-container text-center">
        <a href="{{ route('pet.index') }}" class="menu-btn">Pet</a>
        <a href="{{ route('service.index') }}"  class="menu-btn">Servicio</a>
        <a href="{{ route('citas.index') }}"  class="menu-btn">Citas</a>
    </nav>

    <main class="text-center vintage-content">
        <div class="card vintage-card">
            <h2>Bienvenidos</h2>
            <p>
                Ofrecemos los mejores servicios veterinarios para el cuidado integral de tus mascotas. 
                Desde consultas generales hasta tratamientos especializados.
            </p>
            <a href="{{ route('pets.createPet') }}" class="btn vintage-btn">Registrar Mascota</a>
        </div>

        <div class="vintage-promos">
            <div class="promo-item">
                <h3>Consulta Gratis</h3>
                <p>Primera consulta gratis para nuevos clientes.</p>
            </div>
            <div class="promo-item">
                <h3>Vacunas al 20% de Descuento</h3>
                <p>Paquete especial para cachorros.</p>
            </div>
            <div class="promo-item">
                <h3>Servicio Estético</h3>
                <p>Baño, corte y limpieza integral.</p>
            </div>
        </div>
    </main>

    <footer class="vintage-footer text-center">
        <p>&copy; 2024 Clínica Veterinaria PetCare - Todos los derechos reservados</p>
    </footer>
</div>
@endsection
