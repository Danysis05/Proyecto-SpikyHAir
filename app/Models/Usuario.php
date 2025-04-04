<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios'; // Nombre exacto de la tabla
    protected $primaryKey = 'id';  // Llave primaria correcta

    protected $fillable = [
        'nombre', 'correo', 'password', 'rol', 'telefono'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_usuario');
    }

}
