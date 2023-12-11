<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitosNaf extends Model
{
    use HasFactory;

    protected $table = 'requisitos_nafs';

    protected $primaryKey = 'Id_requisito';

    protected $fillable = [
        'nombre_requisito',
        'descripcion_requisito',
        'Id_naf',
    ];

    public function naf()
    {
        return $this->belongsTo(Naf::class, 'Id_naf');
    }
}
