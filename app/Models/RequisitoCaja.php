<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoCaja extends Model
{
    use HasFactory;

    protected $table = 'requisito_caja';
    protected $primaryKey = 'Id_requisito';
}
