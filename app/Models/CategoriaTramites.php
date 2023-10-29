<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTramites extends Model
{
    protected $table = 'categoriatramites';

    protected $primaryKey = 'id_categoria_tramites';

    protected $fillable = [
        'nombre_categoria', 'estado', 'Id_area'
    ];
}
