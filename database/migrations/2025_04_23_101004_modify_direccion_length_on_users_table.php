<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('direccion', 255)->nullable()->change();
            // Si prefieres usar tipo `text`, usa esta línea en lugar de la anterior:
            // $table->text('direccion')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('direccion', 50)->nullable()->change(); // Revertir a su longitud original
        });
    }
};
