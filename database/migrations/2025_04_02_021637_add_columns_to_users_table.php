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
        Schema::table('users', function (Blueprint $table) {
 
            $table->string('apellido', 50)->nullable();
            $table->string('edad', 3)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('telefono', 12)->nullable();
 
            // Agregar las relaciones con otras tablas
            $table->unsignedBigInteger('id_genero'); // Relación con genero
            $table->unsignedBigInteger('id_rol'); // Relación con rol
            $table->unsignedBigInteger('id_estado'); // Relación con estado
    
            // Definir las claves foráneas
            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');
            $table->foreign('id_genero')->references('id')->on('genero')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
     
        });
    }
};
