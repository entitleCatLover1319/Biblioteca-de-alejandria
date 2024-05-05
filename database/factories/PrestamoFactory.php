<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Libro;
use App\Models\CopiaLibro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $libro_id = Libro::inRandomOrder()->first()->id;
        $fecha_devolucion = fake()->date();
        $creation_date = fake()->dateTimeBetween('-3 week', now());
        $return_date = clone $creation_date;
        $return_date = $return_date->modify('+ 15 day');
        $interval = $return_date->diff(now(), false);
        $dias_atraso = $interval->format('%R%a') > 0 ? $interval->days : 0;
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'libro_id' => $libro_id,
            'copia_libro_id' => CopiaLibro::where('libro_id', $libro_id)->inRandomOrder()->first()->id,
            'fecha_devolucion' => $return_date,
            'dias_atraso' => $dias_atraso,
            'created_at' => $creation_date,
            'updated_at'=> $creation_date,
        ];
    }
}
