<?php

namespace App\Http\Controllers;


use App\Models\Reserva;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $usuario = Auth::user();

    // Consulta base solo con las reservas del usuario autenticado
    $query = Reserva::where('id_usuario', $usuario->id)
                    ->with('servicio');

    // Filtro por fecha (si existe)
    if ($request->filled('fecha')) {
        $query->where('fecha', $request->fecha);
    }

    // Filtro por servicio (si existe)
    if ($request->filled('id_servicio')) {
        $query->where('id_servicio', $request->id_servicio);
    }

    // Obtener resultados finales
    $reservas = $query->get();

    // Obtener todos los servicios para el filtro por servicio
    $servicios = Servicio::all();

    return view('crudReservasUsuario', compact('reservas', 'servicios', 'usuario'));
}



    public function indexAdmin(Request $request)
    {
        $usuario = Auth::user();

        // Definir la consulta base para todas las reservas
        $query = Reserva::with('servicio', 'usuario');

        // Aplicar filtro por fecha si el usuario lo selecciona
        if ($request->filled('fecha')) {
            $query->where('fecha', $request->fecha);
        }

        // Aplicar filtro por servicio si el usuario lo selecciona
        if ($request->filled('id_servicio')) {
            $query->where('id_servicio', $request->id_servicio);
        }

        // Obtener las reservas filtradas
        $reservas = $query->get();
        $servicios = Servicio::all();

        return view('crudReservasAdmin', compact('reservas', 'servicios', 'usuario'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servicios = Servicio::all();
        return view('reservar', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_servicio' => 'required|exists:servicios,id'
        ]);


        Reserva::create([
            'fecha' => $request->fecha,
            'hora'  => $request->hora,
            'id_servicio' => $request->id_servicio,
            'id_usuario' => Auth::id()
        ]);

        return redirect()->route('crudReservasUsuario')
        ->with('success', 'Reserva creada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
{
    // Laravel ya obtiene la reserva automáticamente con Model Binding
    $servicios = Servicio::all();
    return view('editarReserva', compact('reserva', 'servicios'));
}




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {

            $request->validate([
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i',
                'id_servicio' => 'required|exists:servicios,id'
            ]);

            // Laravel ya obtiene la reserva automáticamente
            $reserva->update([
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'id_servicio' => $request->id_servicio
            ]);
        return redirect()->route('crudReservasUsuario')
        ->with('success', 'Reserva creada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete(); // Laravel ya obtiene la reserva automáticamente

        return redirect()->route('crudReservasUsuario')
            ->with('success', 'Reserva eliminada correctamente.');
    }
}
