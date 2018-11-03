<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
          'name' => 'Director ejecutivo',
        ]);

        Role::create([
          'name' => 'Administrador',
        ]);

        Role::create([
          'name' => 'Periodista',
        ]);
    }
}
