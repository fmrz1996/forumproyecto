<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
          'username' => 'admin',
          'email' => 'fmrz1996@gmail.com',
          'first_name' => 'Felipe',
          'last_name' => 'Rosales',
          'description' => 'Estudiante de Ingeniería en Informática y desarrollador web de Forum Comunicaciones, amante de los videojuegos y el sur de Chile',
          'password' => bcrypt('admin'),
          'is_admin' => true,
        ]);

        User::create([
          'username' => 'sromero',
          'email' => 'sromero@gmail.com',
          'first_name' => 'Sergio',
          'last_name' => 'Romero',
          'password' => bcrypt('sromero'),
          'is_admin' => true,
        ]);

        User::create([
          'username' => 'pepito',
          'email' => 'pepito@gmail.com',
          'first_name' => 'Pepe',
          'last_name' => 'Pera',
          'password' => bcrypt('pepito'),
        ]);

        factory(User::class, 47)->create();
    }
}
