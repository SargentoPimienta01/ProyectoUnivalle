<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postgrado extends Model
{
    
    static $rules = [
		'nombre_programa' => 'required',
		'descripcion' => 'required',
		'modalidad' => 'required',
		'categoria' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'Id_postgrado';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Id_postgrado','nombre_programa','descripcion','modalidad','categoria','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'Id_area', 'Id_area');
    }
    

}
