<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Retorna la vista 'login.blade.php'
    }

    /**
     * Maneja el inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Regenera la sesión para prevenir ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirigir al usuario a la ruta 'home' si las credenciales son correctas
            return redirect()->route('home');
        }

        // Retorna un error si la autenticación falla
        return back()->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.',
        ])->onlyInput('email'); // Mantener el email ingresado
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Desautenticar al usuario
        return redirect()->route('login'); // Redirigir al formulario de login
    }
}
