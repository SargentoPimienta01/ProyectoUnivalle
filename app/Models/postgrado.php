<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Postgrado
 *
 * @property $Id_postgrado
 * @property $nombre_programa
 * @property $descripcion
 * @property $modalidad
 * @property $categoria
 * @property $estado
 * @property $Id_area
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Postgrado extends Model
{
    
    static $rules = [
		'Id_postgrado' => 'required',
		'nombre_programa' => 'required',
		'descripcion' => 'required',
		'modalidad' => 'required',
		'categoria' => 'required',
		'estado' => 'required',
		'Id_area' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_postgrado','nombre_programa','descripcion','modalidad','categoria','estado','Id_area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }
    

}
