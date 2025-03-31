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
            $table->enum('genero', ['Masculino', 'Femenino'])->nullable();
            $table->string('direccion', 50)->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('correo', 25)->unique(); 
            $table->string('contrasena', 255); 
            $table->enum('rol', ['Administrador', 'Cliente'])->default('Cliente');
            $table->enum('estado', ['Activo', 'Desactivado'])->default('Activo');
            $table->timestamps();
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
