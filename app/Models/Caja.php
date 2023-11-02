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
        // No incluyas '_token', ya que es una columna interna de Laravel y no debe agregarse aquí.
    ];
    

    public function area()
    {
        return $this->belongsTo(Area::class, 'Id_area', 'Id_area');
    }
}
