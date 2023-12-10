<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;

    protected $table = 'caja';
    protected $primaryKey = 'Id_caja';

    protected $fillable = [
        'nombre_caja',
        'descripcion_caja',
        'estado',
        'Id_area',
    ];

    static $rules = [
		'nombre_caja' => 'required|max:100',
        'descripcion_caja' => 'required|max:256',
    ];
    

    public function area()
    {
        return $this->belongsTo(Area::class, 'Id_area', 'Id_area');
    }
}
