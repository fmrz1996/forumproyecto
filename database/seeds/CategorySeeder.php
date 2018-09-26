<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'name' => 'Actualidad',
        ]);

        Category::create([
          'name' => 'Sociedad',
        ]);

        Category::create([
          'name' => 'Cultura',
        ]);

        Category::create([
          'name' => 'Tecnología',
        ]);

        Category::create([
          'name' => 'Economía',
        ]);

        Category::create([
          'name' => 'Deportes',
        ]);
    }
}
