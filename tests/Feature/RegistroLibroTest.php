<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistroLibroTest extends TestCase
{
    use RefreshDatabase;

    public function test_libro_registration(): void
    {
        $this->seed();

        $user = User::find(1);

        $response = $this->actingAs($user)->post('/libro', [
            'titulo' => mb_strtoupper(substr(fake()->sentence(4), 0, -1)),
            'autor' => null,
        ]);

        $response->assertInvalid(['autor']);
    }
}
