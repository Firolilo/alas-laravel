<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biomasa extends Model
{
    protected $table = 'biomasas';
    
    protected $fillable = [
        'tipo_biomasa',
        'descripcion',
        'densidad',
        'poder_calorifico',
        'degradacion'
    ];

    protected $casts = [
        'poder_calorifico' => 'decimal:2'
    ];
}
