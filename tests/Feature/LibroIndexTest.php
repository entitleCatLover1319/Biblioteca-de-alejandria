<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LibroIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_libro_index_200(): void
    {
        $this->seed();

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/libro');

        $response->assertStatus(200);

        $response->assertSeeText('Catálogo de libros disponibles.');
    }
}
