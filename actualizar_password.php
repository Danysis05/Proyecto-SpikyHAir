<?php

require 'vendor/autoload.php';

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Capsule\Manager as DB;

// Iniciar Laravel manualmente
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Buscar usuario y actualizar contraseña
$usuario = Usuario::where('correo', 'anyisita.dacosta@gmail.com')->first();

if ($usuario) {
    $usuario->password = Hash::make('Dani12345');
    $usuario->save();
    echo "Contraseña actualizada correctamente.\n";
} else {
    echo "Usuario no encontrado.\n";
}
