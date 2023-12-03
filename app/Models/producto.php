<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $view_deleted = 'DeletedRecords';
    protected $fillable = [ 'nombre', 'descripcion', 'precio', 'foto', 'id_categoria', 'estado'];
    protected $dates = ['deleted_at']; 

    public function categoria()
    {
        return $this->belongsTo(CategoriaMenu::class, 'id_categoria');
    }
}
