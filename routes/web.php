<?php

use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReservasController;

Route::get('/', function () {
    return redirect()->route('iniciarSesion'); // Redirigir a la ruta de login
});

// Registro de usuario
Route::get('/registrarse', function () {return view('auth.register');
})->name('registrarse');
Route::post('/registrarse', [AuthController::class, 'register'])->name('registrarse.post');



// Inicio de sesión
Route::get('/iniciarSesion', function () {
    return view('auth.login');
})->name('iniciarSesion');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta protegida después del login
Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () { return view('index');})->name('index');
    Route::get('/productos', function () { return view('productos'); })->name('productos');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Rutas para el CRUD de usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('crudUsuarios');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('actualizar');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('eliminar');
    // Rutas para el CRUD de servicios
    Route::get('/servicios', [ServicioController::class, 'indexAdmin'])->name('crudServicios');
    Route::get('/servicios/usuario', [ServicioController::class, 'indexUsuario'])->name('ServiciosUsuario');
    Route::get('/servicios/crear', [ServicioController::class, 'create'])->name('crearServicio');
    Route::post('/servicios', [ServicioController::class, 'store'])->name('guardarServicio');
    Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('eliminarServicio');
    // Rutas para el CRUD de reservas

    Route::get('/reservas', [ReservasController::class, 'indexAdmin'])->name('crudReservasAdmin');
    Route::get('/reservas/usuario', [ReservasController::class, 'index'])->name('crudReservasUsuario');
    Route::get('/reservas/crear', [ReservasController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservasController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}/editar', [ReservasController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [ReservasController::class, 'update'])->name('reservas.update');

    Route::delete('/reservas/{reserva}', [ReservasController::class, 'destroy'])->name('reservas.destroy');
    Route::delete('/reservas/usuario/{reserva}', [ReservasController::class, 'destroyCliente'])->name('reservas.destroyUsuario');

});



