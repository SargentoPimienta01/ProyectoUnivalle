<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioDireccion extends Model
{
    use HasFactory;

    protected $table = 'servicio_direccion';
    protected $fillable = ['Titulo', 'imagen', 'Image', 'Requisitos', 'estado', 'direccion_carrera_id'];

    public function direccionCarrera()
    {
        return $this->belongsTo(DireccionCarrera::class, 'direccion_carrera_id');
    }
}
