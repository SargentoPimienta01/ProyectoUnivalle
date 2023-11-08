<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'Tramite';
    protected $primaryKey = 'Id_tramite';

    protected $fillable = [
        'nombre_tramite', 'duracion_tramite', 'id_categoria_tramites', 'estado', 'id_ubicacion'
    ];

    public function categoriaTramite()
    {
        return $this->belongsTo(CategoriaTramites::class, 'id_categoria_tramites', 'id_categoria_tramites');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

}
