<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_area';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'Id_area', 'nombre_area', 'descripcion', 'estado'
    ];
}
