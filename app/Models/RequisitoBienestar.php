<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoBienestar extends Model
{
    use HasFactory;

    protected $table = 'requisito_bienestar';

    protected $fillable = [
        'servicio',
        'detalle',
        'requisitos',
        'horarios',
        'estado',
        'Id_bienestar',
    ];

    public function bienestar()
    {
        return $this->belongsTo(BienestarUniversitario::class, 'Id_bienestar');
    }
}

