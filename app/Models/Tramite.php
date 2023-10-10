<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'Tramite';

    protected $fillable = [
        'nombre_tramite', 'duracion_tramite', 'id_categoria_tramites', 'estado'
    ];
}
