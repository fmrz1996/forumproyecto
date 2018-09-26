<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Post::create([
        'title' => 'Las 4 nuevas rutas turísticas Valle del Itata',
        'body' => '“Viñas y Observación de aves”, “Aventura campo y mar”, “Alma del Valle” y “Ruta Agroecológica patrimonial” son los nombres de las nuevas rutas disponibles para los turistas en el Valle del Itata con alto valor identitario y patrimonial. “El desafío fue realizar rutas turísticas comercializables en la zona considerando la oferta de las nueve comunas que integran el Valle. Para esto, lo primero que realizamos fue un diagnostico desde nuestra mirada comercial integrando visitas en terreno, estudios, valorización. Gracias a este trabajo hoy las rutas están tarificadas, dirigidas a un tipo específico de segmento y ahora disponibles para la venta”, señala Alejandra Arias, gerente comercial Esquerré Tour Operador quien entregó los resultados del proyecto a los empresarios de la zona en el marco de una licitación de la Dirección Regional de Turismo del Biobío y el programa Zona de Oportunidades.',
        'category_id' => 1,
        'user_id' => 1,
      ]);
    }
}
