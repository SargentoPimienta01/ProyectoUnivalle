<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plataforma_de_atencion extends Model
{
    use HasFactory;

    protected $table = 'plataforma_de_atencion';
    protected $primaryKey = 'Id_plataforma_de_atencion';
    protected $fillable = [
        'servicio',
        'descripcion',
        'estado',
        'Id_area',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'Id_area');
    }
}
