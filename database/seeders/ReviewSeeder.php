<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Libro;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 500; $i++) {
            Review::factory()
                ->for(Libro::inRandomOrder()
                    ->first())
                ->for(User::inRandomOrder()
                    ->first())
                ->create();
        }
    }
}
