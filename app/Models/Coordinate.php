<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coordinate extends Model
{
    use HasFactory;

    protected $table = 'coordinates';

    protected $fillable = [
        'lat',
        'lng',
    ];

    public $timestamps = false;

    public function fireRiskData()
    {
        return $this->hasMany(FireRiskData::class, 'coordinates_id');
    }
}
