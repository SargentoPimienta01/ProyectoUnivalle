<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoCaja extends Model
{
    use HasFactory;

    protected $table = 'requisito_caja';
    protected $primaryKey = 'Id_requisito';

    protected $fillable = [
        'nombre_requisito',
        'descripcion_requisito',
        'estado',
        'Id_caja',
        // No incluyas '_token', ya que es una columna interna de Laravel y no debe agregarse aquí.
    ];
}
