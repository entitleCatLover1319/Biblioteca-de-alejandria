<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(4),
            'isbn_13' => fake()->numerify('#############'),
            'isbn_10' => fake()->boolean() ? fake()->numerify('##########') : null,
            'autor' => fake()->name(),
            'editorial' => fake()->words(2, true),
            'edicion' => fake()->numberBetween(1, 9),
            'ano_publicacion' => fake()->numberBetween(1800, 2024),
            'cantidad_ejemplares' => fake()->numberBetween(1, 15),
            'portada' => null,
        ];
    }
}
