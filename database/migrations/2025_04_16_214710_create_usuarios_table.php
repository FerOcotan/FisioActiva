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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('idusuario');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('edad', 3)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('correo', 25)->unique(); 
            $table->string('contrasena', 255); 
            $table->timestamps();

            // Agregar el campo para almacenar la relación con la tabla genero
            $table->unsignedBigInteger('id_genero')->nullable();  // Relación con genero

            // Agregar el campo para almacenar la relación con la tabla estado
            $table->unsignedBigInteger('id_estado')->nullable();  // Relación con estado

            // Definir las claves foráneas
            $table->foreign('id_genero')->references('id')->on('genero')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
