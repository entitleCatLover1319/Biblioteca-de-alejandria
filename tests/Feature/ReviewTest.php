<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Review;
use App\Models\User;
use App\Models\Libro;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_review(): void
    {
        $this->seed();

        $user = User::inRandomOrder()->first();

        $review = Review::factory()
                    ->for(Libro::inRandomOrder()
                        ->first())
                    ->for($user)
                    ->create();

        $this->actingAs($user)->delete('/review/' . $review->id);
        $this->assertSoftDeleted($review);

        $this->actingAs($user)->delete('/review/trashed/' . $review->id);
        $this->assertModelMissing($review);
    }
}
