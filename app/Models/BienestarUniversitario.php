<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienestarUniversitario extends Model
{
    use HasFactory;

    protected $table = 'bienestar_universitario';

    protected $fillable = [
        'servicio',
        'detalle',
        'estado',
        'Id_area',
        'id_ubicacion',
    ];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }
}

