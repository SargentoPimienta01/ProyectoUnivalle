<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoTramite extends Model
{
    protected $table = 'RequisitoTramite';

    protected $primaryKey = 'Id_requisito';

    protected $fillable = [
        'nombre_requisito', 'descripcion_requisito', 'estado', 'Id_tramite'
    ];

    static $rules = [
		'nombre_requisito' => 'required|max:100',
        'descripcion_requisito' => 'required|max:500',
        'estado'=> 'required',
        'Id_tramite'=> 'required'
    ];
}
