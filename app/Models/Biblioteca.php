<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biblioteca extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $view_deleted = 'DeletedRecords';
    protected $fillable = ['titulo', 'descripcion', 'hora', 'fecha', 'categoria', 'estado'];
    
    protected $dates = ['fecha'];
  //  protected $dates = ['deleted_at'];
  protected $attributes = [
    'fecha' => null, 
];
}
