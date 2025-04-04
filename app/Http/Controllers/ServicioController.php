<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin(Request $request)
    {
        $query = Servicio::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        if ($request->filled('precio')) {
            $query->where('precio', $request->precio);
        }

        if ($request->filled('detalles')) {
            $query->where('detalles', 'like', '%' . $request->detalles . '%');
        }

        $servicios = $query->get();

        return view("crudServicios", compact("servicios"));
    }
    public function indexUsuario()
    {
        $servicios = Servicio::all();
        $usuario = Auth::user();
        return view("servicios", compact("servicios", "usuario"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("agregarServicios" );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'detalles' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $servicio = Servicio::create($request->all());
        return redirect()->route('crudServicios')->with('success', 'Servicio agregado correctamente');

    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view("actualizarServicios", compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'detalles' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());

        return redirect()->route('crudServicios')->with('success', 'Servicio actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $dato = Servicio::findOrFail($id);
        $dato->delete();
        return redirect()->route('crudServicios')->with('success', 'Servicio eliminado Perfectamente');
    }


}

