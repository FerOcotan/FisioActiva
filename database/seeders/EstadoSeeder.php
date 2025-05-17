<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado')->insert([
            ['titulo' => 'Activo', 'descripcion' => 'Usuario Activo'],
            ['titulo' => 'Inactivo', 'descripcion' => 'Usuario Inactivo'],
            ['titulo' => 'Abierto', 'descripcion' => 'Expediente abierto'],
            ['titulo' => 'Cerrado', 'descripcion' => 'Expediente cerrado'],
            ['titulo' => 'Pendiente', 'descripcion' => 'Cita pendiente'],
            ['titulo' => 'Finalizada', 'descripcion' => 'Cita finalizada'],
            ['titulo' => 'Cancelada', 'descripcion' => 'Cita cancelada'],
            
        ]);
    }
}
