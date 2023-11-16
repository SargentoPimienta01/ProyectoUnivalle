<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GabinetesMedico
 *
 * @property $Id_gabinetemedico
 * @property $nombre_gabinetemedico
 * @property $ubicacion_gabinetemedico
 * @property $estado
 * @property $Id_area
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property RequisitosGabinetesMedico[] $requisitosGabinetesMedicos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GabinetesMedico extends Model
{
    protected $primaryKey = 'Id_gabinetemedico';

    static $rules = [
		'Id_gabinetemedico' => 'required',
		'nombre_gabinetemedico' => 'required',
		'ubicacion_gabinetemedico' => 'required',
		'estado' => 'required',
		'Id_area' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_gabinetemedico','nombre_gabinetemedico','ubicacion_gabinetemedico','estado','Id_area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requisitosGabinetesMedicos()
    {
        return $this->hasMany('App\Models\RequisitosGabinetesMedico', 'Id_gabinetemedico', 'Id_gabinetemedico');
    }
    

}
