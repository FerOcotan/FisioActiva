<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create(); // Crear una instancia de Faker

        // Insertar usuarios específicos
        DB::table('users')->insert([
            [
                'name' => 'Carlos Gustavo',
                'email' => 'gustavo@example.com',
                'password' => Hash::make('password'),  // Cambia 'password' a una contraseña segura
                'apellido' => 'Hidalgo',
                'edad' => 30,
                'direccion' => substr($faker->address, 0, 20),  // Limitar la longitud de la dirección a 100 caracteres
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->numerify('###-###'),
                'id_genero' => 1,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Melvin Fernando',
                'email' => 'fernanocotan@gmail.com',
                'password' => Hash::make('password'),
                'apellido' => 'Ocotan Morales',
                'edad' => 21,
            'direccion' => substr($faker->address, 0, 20),  // Limitar la longitud de la dirección a 100 caracteres
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->numerify('###-###'),
                'id_genero' => 1,  
                'id_rol' => 1,     
                'id_estado' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Angel Roberto',
                'email' => 'angel@example.com',
                'password' => Hash::make('password'),
                'apellido' => 'Meza Guardado',
                'edad' => 25,
                'direccion' => substr($faker->address, 0, 20),  // Limitar la longitud de la dirección a 100 caracteres
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->numerify('###-###'),
                'id_genero' => 1,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
              [
                'name' => 'Xiomara Isabel',
                'email' => 'xiomaram768@gmail.com',
                'password' => Hash::make('bukele123'),
                'apellido' => 'Meza Guardado',
                'edad' => 24,
                'direccion' => substr($faker->address, 0, 20),  // Limitar la longitud de la dirección a 100 caracteres
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->numerify('###-###'),
                'id_genero' => 2,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

      
    }
}
