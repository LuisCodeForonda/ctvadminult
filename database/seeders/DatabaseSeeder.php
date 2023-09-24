<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Programacion::factory(30)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'luis@gmail.com',
            'status' => true,
            'password' => Hash::make('password'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Silvana Quintanilla',
            'email' => 'silvana@gmail.com',
            'status' => true,
            'password' => Hash::make('password'),
        ]);
    }
}
