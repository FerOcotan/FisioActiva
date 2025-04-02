<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GeneroSeeder::class,  // Primero se ejecuta GeneroSeeder
            RolSeeder::class,     // Después RolSeeder
            EstadoSeeder::class,  // Luego EstadoSeeder
            UserSeeder::class,    // Finalmente UserSeeder
        ]);
    }
}
