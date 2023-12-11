<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $view_deleted = 'DeletedRecords';
    protected $fillable = ['nombre','detalle', 'fecha', 'hora', 'estado'];
    static $rules = [
      'nombre' => 'required',
      'detalle' => 'required',
      'fecha' => 'required',
      'hora'=> 'required',
      ];
    protected $dates = ['fecha'];
  //  protected $dates = ['deleted_at'];
    protected $attributes = [
      'fecha' => null, // Set the default value for fecha to null or any default date you want
  ];
}
