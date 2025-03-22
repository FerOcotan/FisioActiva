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
        Schema::create('citas', function (Blueprint $table) 
        {
            $table->bigIncrements('numerocita'); // Clave primaria
            $table->unsignedBigInteger('numeroexpediente'); // Clave foránea
            $table->timestamp('fechahora')->default(now())->useCurrentOnUpdate();
            $table->enum('modalidad', ['Local', 'Visita'])->nullable();
            $table->float('cargo')->nullable();
            $table->enum('estado', ['Pendiente', 'Finalizada', 'Cancelada'])->nullable();
            $table->timestamps();

            // Relación con la tabla expedientes
            $table->foreign('numeroexpediente')->references('numeroexpediente')->on('expedientes')->onDelete('cascade'); 
           
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
