<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{


    // Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'required|string|max:15',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => 'cliente',
            'telefono' => $request->telefono,
        ]);

        Auth::login($usuario);

        return redirect()->route('index');
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {
            $usuario = Auth::user();
            return redirect()->route($usuario->rol === 'administrador' ? 'crudUsuarios' : 'index');
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas'])->withInput();
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('iniciarSesion');
    }
}
