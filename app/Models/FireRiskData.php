<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FireRiskData extends Model
{
    use HasFactory;

    protected $table = 'fire_risk_data';

    protected $fillable = [
        'timestamp',
        'location',
        'duration',
        'volunteers',
        'volunteer_name',
        'name',
        'coordinates_id',
        'weather_id',
        'environmental_factors_id',
        'fire_risk',
        'fire_detected',
        'parameters_temperature',
        'parameters_humidity',
        'parameters_wind_speed',
        'parameters_wind_direction',
        'parameters_simulation_speed',
        'initial_fires',
    ];

    protected $casts = [
        'initial_fires' => 'array',
        'fire_detected' => 'boolean',
    ];

    public function coordinate()
    {
        return $this->belongsTo(Coordinate::class, 'coordinates_id');
    }
}
