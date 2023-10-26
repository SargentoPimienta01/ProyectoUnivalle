<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RequisitosGabinetesMedico
 *
 * @property $Id_requisito
 * @property $nombre_requisito
 * @property $descripcion_requisito
 * @property $estado
 * @property $Id_gabinetemedico
 * @property $created_at
 * @property $updated_at
 *
 * @property GabinetesMedico $gabinetesMedico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RequisitosGabinetesMedico extends Model
{
    
    static $rules = [
		'Id_requisito' => 'required',
		'nombre_requisito' => 'required',
		'descripcion_requisito' => 'required',
		'estado' => 'required',
		'Id_gabinetemedico' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_requisito','nombre_requisito','descripcion_requisito','estado','Id_gabinetemedico'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gabinetesMedico()
    {
        return $this->hasOne('App\Models\GabinetesMedico', 'Id_gabinetemedico', 'Id_gabinetemedico');
    }
    

}
