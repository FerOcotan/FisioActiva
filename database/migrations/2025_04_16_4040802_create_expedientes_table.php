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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('numeroexpediente'); // Clave primaria
         
            $table->date('fechacreacion');
            $table->integer('numcitas')->nullable();
            $table->longText('diagnostico')->nullable();
            $table->date('fechaevaluacion')->nullable();
            $table->longText('historiaclinica')->nullable();
            $table->mediumText('observacion')->nullable();
            $table->mediumText('palpacion')->nullable();
            $table->mediumText('sensibilidad')->nullable();
            $table->mediumText('arcosdemovimiento')->nullable();
            $table->mediumText('fuerzamuscular')->nullable();
            $table->mediumText('perimetria')->nullable();
            $table->mediumText('longitudmiembrosinf')->nullable();
            $table->mediumText('marcha')->nullable();
            $table->mediumText('postura')->nullable();
            $table->string('nombrefisioterapeuta', 50)->default('Licda. Xiomara Meza');
            $table->longText('notasevolutivas')->nullable();



            $table->unsignedBigInteger('id_usuario'); // Clave foránea


            // Agregar la columna id_estado
    
            $table->unsignedBigInteger('id_estado')->nullable();  // Relación con estado

            // Definir las claves foráneas
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estado')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
