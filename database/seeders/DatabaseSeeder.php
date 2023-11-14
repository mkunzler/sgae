<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\EnumCourseModality;
use App\Enums\EnumUserPermission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrador do Sistema',
            'registration' => fake()->unique()->randomNumber(),
            'email' => 'mateusbkunzler@gmail.com',
            'permission' => EnumUserPermission::ADMIN,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => null,
            'status' => true,
        ]);

        \App\Models\Course::factory(5)->create();

        \App\Models\Course::factory()->create([
            'name' => 'Sistemas de Informação',
            'modality' => EnumCourseModality::BACHELOR,
        ]);

        \App\Models\Course::factory()->create([
            'name' => 'Matemática',
            'modality' => EnumCourseModality::GRADUATION,
        ]);
    }
}
