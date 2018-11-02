<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
                'username' => 'admin',
                'email' => 'sromero@gmail.com',
                'first_name' => 'Sergio',
                'last_name' => 'Romero',
                'role_id' => 1,
                'password' => bcrypt('admin'),
              ]);

      $user = User::create([
                'username' => 'fmrz1996',
                'email' => 'fmrz1996@gmail.com',
                'first_name' => 'Felipe',
                'last_name' => 'Rosales',
                'role_id' => 2,
                'description' => 'Estudiante de Ingeniería en Informática y desarrollador web de Forum Comunicaciones, amante de los videojuegos y el sur de Chile',
                'password' => bcrypt('1q2w3e4r'),
              ]);

      $user = User::create([
                'username' => 'matias.fucru',
                'email' => 'matias.fucru@gmail.com',
                'first_name' => 'Matías',
                'last_name' => 'Fuentes',
                'role_id' => 2,
                'password' => bcrypt('matias'),
              ]);

      $user = User::create([
                'username' => 'pepito',
                'email' => 'pepito@gmail.com',
                'first_name' => 'Pepe',
                'last_name' => 'Pera',
                'role_id' => 3,
                'password' => bcrypt('pepito'),
              ]);

        //Usuarios creados con datos aleatorios
        factory(User::class, 17)->create();
    }
}
