<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RequisitosNaf
 *
 * @property $Id_requisito
 * @property $nombre_requisito
 * @property $descripcion_requisito
 * @property $estado
 * @property $Id_naf
 * @property $created_at
 * @property $updated_at
 *
 * @property Naf $naf
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RequisitosNaf extends Model
{
    
    static $rules = [
		'Id_requisito' => 'required',
		'nombre_requisito' => 'required',
		'descripcion_requisito' => 'required',
		'estado' => 'required',
		'Id_naf' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_requisito','nombre_requisito','descripcion_requisito','estado','Id_naf'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function naf()
    {
        return $this->hasOne('App\Models\Naf', 'Id_naf', 'Id_naf');
    }
    

}
