<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoCaja extends Model
{
    use HasFactory;

    protected $table = 'requisito_caja';
    protected $primaryKey = 'Id_requisito';

    protected $fillable = [
        'nombre_requisito',
        'descripcion_requisito',
        'Id_caja',
    ];

    static $rules = [
		'nombre_requisito' => 'required|max:100',
        'descripcion_requisito' => 'required|max:500',
        'Id_caja'=> 'required'
    ];
}
