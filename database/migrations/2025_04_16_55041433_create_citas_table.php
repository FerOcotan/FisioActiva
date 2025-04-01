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
         
            // Definir la columna para la relación con expedientes
            $table->unsignedBigInteger('numeroexpediente'); // Relación con la tabla expedientes
            
            // Definir la columna para la relación con modalidades
            $table->unsignedBigInteger('id_modalidad'); // Relación con la tabla modalidades

            // Definir la columna para la relación con estados
            $table->unsignedBigInteger('id_estado'); // Relación con la tabla estados

            $table->timestamp('fechahora')->default(now())->useCurrentOnUpdate();
            $table->float('cargo')->nullable();
            
            $table->timestamps();
            // Definir las claves foráneas

            // Relación con la tabla expedientes
            $table->foreign('numeroexpediente')->references('numeroexpediente')->on('expedientes')->onDelete('cascade'); 
            
            // Relación con la tabla modalidades
            $table->foreign('id_modalidad')->references('id')->on('modalidad')->onDelete('cascade'); 
            
            // Relación con la tabla estados
            $table->foreign('id_estado')->references('id')->on('estado')->onDelete('cascade');
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
