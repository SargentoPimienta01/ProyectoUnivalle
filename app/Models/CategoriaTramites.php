<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriaTramite
 *
 * @property $id_categoria_tramites
 * @property $nombre_categoria
 * @property $estado
 * @property $Id_area
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property Tramite[] $tramites
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriaTramites extends Model
{
    protected $table = 'categoriatramites';

    protected $primaryKey = 'id_categoria_tramites';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_categoria', 'estado', 'Id_area'
    ];


    static $rules = [
		'id_categoria_tramites' => 'required',
		'nombre_categoria' => 'required',
		'estado' => 'required',
		'Id_area' => 'required',
    ];

    protected $perPage = 20;

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
    public function tramites()
    {
        return $this->hasMany('App\Models\Tramite', 'id_categoria_tramites', 'id_categoria_tramites');
    }
}
