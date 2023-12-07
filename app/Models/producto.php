<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [ 'nombre', 'descripcion', 'precio', 'foto', 'id_categoria', 'estado'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaMenu::class, 'id_categoria');
    }
}
