<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Naf
 *
 * @property $Id_naf
 * @property $nombre_naf
 * @property $ubicacion_naf
 * @property $estado
 * @property $Id_area
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Naf extends Model
{
    
    static $rules = [
		'Id_naf' => 'required',
		'nombre_naf' => 'required',
		'ubicacion_naf' => 'required',
		'estado' => 'required',
		'Id_area' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_naf','nombre_naf','ubicacion_naf','estado','Id_area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }
    

}
