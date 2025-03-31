<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('economicos', function (Blueprint $table) 
        {
            $table->id(); // Clave primaria autoincremental
            $table->integer('yearr')->nullable(); // Año de los datos económicos
            $table->integer('mes')->nullable(); // Mes de los datos económicos
            $table->integer('numcitas')->nullable(); // Número de citas
            $table->float('ingresos')->nullable(); // Ingresos generados

            $table->timestamps(); // Agrega `created_at` y `updated_at` automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('economicos');
    }
};
