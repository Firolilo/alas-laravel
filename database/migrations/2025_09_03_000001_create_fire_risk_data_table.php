<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fire_risk_data', function (Blueprint $table) {
            $table->id();
            $table->string('timestamp');
            $table->string('location');
            $table->decimal('duration');
            $table->integer('volunteers');
            $table->string('volunteer_name')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('coordinates_id')->constrained('coordinates')->cascadeOnDelete();
            $table->unsignedBigInteger('weather_id')->nullable();
            $table->unsignedBigInteger('environmental_factors_id')->nullable();
            $table->decimal('fire_risk');
            $table->boolean('fire_detected');
            $table->decimal('parameters_temperature')->nullable();
            $table->decimal('parameters_humidity')->nullable();
            $table->decimal('parameters_wind_speed')->nullable();
            $table->decimal('parameters_wind_direction')->nullable();
            $table->decimal('parameters_simulation_speed')->nullable();
            $table->jsonb('initial_fires')->default('[]');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fire_risk_data');
    }
};
