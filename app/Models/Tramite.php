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

    static $rules = [
		'nombre_tramite' => 'required|max:255',
        'duracion_tramite' => 'required|max:100',
        'id_categoria_tramites'=> 'required',
        'id_ubicacion'=> 'required'
    ];

    public function categoriaTramite()
    {
        return $this->belongsTo(CategoriaTramites::class, 'id_categoria_tramites', 'id_categoria_tramites');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    // En el modelo Tramite.php
    public function requisitos()
    {
        return $this->hasMany(RequisitoTramite::class, 'id_tramite', 'id');
    }

}
