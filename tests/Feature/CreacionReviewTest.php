<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Libro;
use Tests\TestCase;

class CreacionReviewTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_creacion_review(): void
    {
        $this->seed();

        $user = User::factory()->create();
        $review = fake()->paragraph();
        $puntaje =fake()->numberBetween(1, 5);

        $libro_id = Libro::inRandomOrder()->first()->id;

        $response = $this->actingAs($user)->post('/review', [
            'libro_id' => $libro_id,
            'review' => $review,
            'puntaje' => $puntaje,
        ]);

        $this->assertDatabaseHas('review', [
            'libro_id' => $libro_id,
            'user_id' => $user->id,
            'contenido' => $review,
            'puntaje' => $puntaje,
        ]);

        $response->assertRedirect('libro/' . $libro_id);
    }
}
