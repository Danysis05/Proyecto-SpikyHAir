<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';

    protected $fillable = [
        'hora',
        'fecha',
        'id_usuario',
        'id_servicio'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

}
