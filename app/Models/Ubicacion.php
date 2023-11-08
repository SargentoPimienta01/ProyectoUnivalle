<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';

    static $rules = [
		'nombre_ubicacion' => 'required',
		'edificio' => 'required',
		'planta' => 'required',
		'horario',
		'detalles_direccion',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nombre_ubicacion',
        'edificio',
        'planta',
        'horario',
        'detalles_direccion',
    ];

    public function tramites()
    {
        return $this->hasMany(Tramite::class, 'id_ubicacion');
    }
    
}
