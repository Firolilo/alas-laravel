<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Crear los tipos ENUM
        DB::statement("CREATE TYPE densidad_enum AS ENUM ('Baja', 'Media', 'Alta')");
        DB::statement("CREATE TYPE degradacion_enum AS ENUM ('Baja', 'Media', 'Alta')");

        Schema::create('biomasas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_biomasa');
            $table->text('descripcion')->nullable();
            $table->enum('densidad', ['Baja', 'Media', 'Alta']);
            $table->decimal('poder_calorifico', 8, 2);
            $table->enum('degradacion', ['Baja', 'Media', 'Alta']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biomasas');
        
        // Eliminar los tipos ENUM
        DB::statement('DROP TYPE IF EXISTS densidad_enum');
        DB::statement('DROP TYPE IF EXISTS degradacion_enum');
    }
};
