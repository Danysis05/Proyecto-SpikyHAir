<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'detalles', 'precio'];
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_servicio');
    }
}

