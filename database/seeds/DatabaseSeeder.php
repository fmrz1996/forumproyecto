<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
          'users',
          'roles',
          'categories',
          'posts'
        ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

      foreach ($tables as $table) {
        DB::table($table)->truncate();
      }

      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
