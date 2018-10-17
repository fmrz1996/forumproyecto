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

      $role_admin = Role::where('name', 'Administrador')->first();
      $role_developer = Role::where('name', 'Desarrollador')->first();
      $role_journalist = Role::where('name', 'Periodista')->first();

      $user = User::create([
                'username' => 'admin',
                'email' => 'sromero@gmail.com',
                'first_name' => 'Sergio',
                'last_name' => 'Romero',
                'password' => bcrypt('admin'),
              ]);
              $user->roles()->attach($role_admin);

      $user = User::create([
                'username' => 'fmrz1996',
                'email' => 'fmrz1996@gmail.com',
                'first_name' => 'Felipe',
                'last_name' => 'Rosales',
                'description' => 'Estudiante de Ingeniería en Informática y desarrollador web de Forum Comunicaciones, amante de los videojuegos y el sur de Chile',
                'password' => bcrypt('1q2w3e4r'),
              ]);
              $user->roles()->attach($role_developer);

      $user = User::create([
                'username' => 'pepito',
                'email' => 'pepito@gmail.com',
                'first_name' => 'Pepe',
                'last_name' => 'Pera',
                'password' => bcrypt('pepito'),
              ]);
              $user->roles()->attach($role_journalist);

        //Usuarios creados con datos aleatorios
        factory(User::class, 17)->create();
    }
}
