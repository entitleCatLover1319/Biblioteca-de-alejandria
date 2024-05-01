<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CopiaLibro;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;

class CopiaLibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // No se usa factory para CopiaLibro porque es necesario crear múltiples
    // instancias con los mismos datos.
    public function run(): void
    {
        foreach (Libro::all() as $libro) {
            $isbn_13 = fake()->numerify('#############');
            $isbn_10 = fake()->boolean() ? fake()->numerify('##########') : null;
            $ano_publicacion = fake()->numberBetween(1800, 2024);
            $edicion = fake()->numberBetween(1, 9);
            $portada = fake()->imageURL(500, 759, 'animals', true, null, false, 'png');
            $libro_id = $libro->id;
            $editorial_id = Editorial::inRandomOrder()->first()->id;

            $amount_copies = rand(1, 10);

            for ($i = 0; $i < $amount_copies; $i++) {
                CopiaLibro::create([
                    'isbn_13' => $isbn_13,
                    'isbn_10' => $isbn_10,
                    'ano_publicacion' => $ano_publicacion,
                    'edicion' => $edicion,
                    'portada' => $portada,
                    'libro_id' => $libro->id,
                    'editorial_id' => $editorial_id,
                ]);
            }
        }
    }
}
