<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();

        // Filtros
        $query = Usuario::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('correo')) {
            $query->where('correo', 'like', '%' . $request->correo . '%');
        }

        if ($request->filled('rol')) {
            $query->where('rol', $request->rol);
        }

        $usuarios = $query->get();

        return view('crudUsuarios', compact('usuarios', 'usuario'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:usuarios,correo,'.$id, // Evita duplicados excepto en el mismo registro
        'password' => 'nullable|min:6'
    ]);

    $usuario = Usuario::findOrFail($id);
    $usuario->nombre = $request->nombre;
    $usuario->correo = $request->correo;
    if ($request->filled('password')) {
        $usuario->password = bcrypt($request->password);
    }
    $usuario->save();

    return redirect()->back()->with('success', 'Registro actualizado correctamente.');
}
public function destroy($id)
{
    $dato = Usuario::findOrFail($id);
    $dato->delete();

    return redirect()->back()->with('success', 'Registro eliminado correctamente.');
}

}
