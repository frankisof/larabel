<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 400px; width: 100%;">
        <h1 style="text-align: center; color: #333333; margin-bottom: 20px;">Iniciar Sesión</h1>
        <form method="Get" action="{{ route('home') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px; color: #555555;">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       style="width: 100%; padding: 10px; border: 1px solid #cccccc; border-radius: 5px; box-sizing: border-box; font-size: 14px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px; color: #555555;">Contraseña:</label>
                <input type="password" id="password" name="password" required
                       style="width: 100%; padding: 10px; border: 1px solid #cccccc; border-radius: 5px; box-sizing: border-box; font-size: 14px;">
            </div>
            @if ($errors->any())
                <div style="margin-bottom: 10px;">
                    <p style="margin: 0; color: #ff0000; font-size: 14px; text-align: center;">{{ $errors->first() }}</p>
                </div>
            @endif
            <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px;">Ingresar</button>
        </form>
    </div>
</body>
</html>
