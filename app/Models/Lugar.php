<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'lugares';
    
    protected $fillable = [
        'nombre_lugar',
        'ubicacion',
        'tipo_lugar',
        'descripcion'
    ];
}
