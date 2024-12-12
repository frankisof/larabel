<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
    </li>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Mascotas')</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">

</head>
<body>
    <header>
        <nav>
            <!-- Puedes añadir un menú si lo necesitas -->
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Gestión de Mascotas</p>
    </footer>
</body>
</html>
