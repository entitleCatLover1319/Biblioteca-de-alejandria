<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'jose',
            'email' => 'jose@gmail.com',
            'password' => Hash::make('superpassword'),
            'is_admin' => true,
        ]);
        // Not admin user
        User::create([
            'name' => 'guadalupe',
            'email' => 'guadalupe@gmail.com',
            'password' => Hash::make('superpassword'),
            'is_admin' => false,
        ]);
        User::factory(100)->create();
    }
}
