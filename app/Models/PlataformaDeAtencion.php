<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlataformaDeAtencion
 *
 * @property $Id_plataforma_de_atencion
 * @property $servicio
 * @property $descripcion
 * @property $estado
 * @property $Id_area
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PlataformaDeAtencion extends Model
{
    
    static $rules = [
		'Id_plataforma_de_atencion' => 'required',
		'servicio' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
		'Id_area' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_plataforma_de_atencion','servicio','descripcion','estado','Id_area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }
    

}
