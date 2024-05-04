<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creation_date = fake()->dateTimeBetween('-3 week', now());
        return [
            'contenido' => fake()->paragraph(),
            'puntaje' => fake()->numberBetween(1, 5),
            'created_at' => $creation_date,
            'updated_at'=> $creation_date,
        ];
    }
}
