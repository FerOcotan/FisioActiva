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
                'name' => 'gustavo',
                'email' => 'gustavo@example.com',
                'password' => Hash::make('password'),  // Cambia 'password' a una contraseña segura
                'apellido' => 'hidalgo',
                'edad' => 30,
                'direccion' => $faker->address,
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->phoneNumber,
                'id_genero' => 1,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ferna',
                'email' => 'fernanocotan@gmail.com',
                'password' => Hash::make('password'),
                'apellido' => 'morales',
                'edad' => 12,
                'direccion' => 'wqeq',
                'latitud' => 0,
                'longitud' => 0,
                'telefono' => '1212',
                'id_genero' => 1,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'angel',
                'email' => 'angel@example.com',
                'password' => Hash::make('password'),
                'apellido' => 'meza',
                'edad' => 25,
                'direccion' => $faker->address,
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->phoneNumber,
                'id_genero' => 1,  // Asumiendo que 1 es el id del género
                'id_rol' => 1,     // Rol 1
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insertar usuarios random
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Cambia 'password' a una contraseña segura
                'apellido' => $faker->lastName,
                'edad' => $faker->numberBetween(18, 60),
                'direccion' => $faker->address,
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'telefono' => $faker->phoneNumber,
                'id_genero' => $faker->randomElement([1, 2]),  // Aleatorio entre 1 o 2
                'id_rol' => 2,     // Rol 2 para usuarios aleatorios
                'id_estado' => 1,  // Asumiendo que 1 es el id del estado
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
