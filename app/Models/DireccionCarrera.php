<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionCarrera extends Model
{
    use HasFactory;

    protected $table = 'direccion_carrera';

    protected $fillable = [
        'carrera',
        'descripcion',
        'facultad',
        'estado',
    ];
    // En el modelo DireccionCarrera
    public function servicios()
    {
        return $this->hasMany(ServicioDireccion::class, 'id', 'idDireccion');
    }
}
