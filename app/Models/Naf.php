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
    protected $primaryKey = 'Id_naf';
    static $rules = [
		'nombre_naf' => 'required',
		'id_ubicacion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_naf','id_ubicacion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }    

}
