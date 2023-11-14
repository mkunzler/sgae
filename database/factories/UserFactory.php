<?php

namespace Database\Factories;

use App\Enums\EnumUserPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enumUserType = EnumUserPermission::cases();
        $permission =  fake()->randomElement($enumUserType)->value;
        return [
            'name' => fake()->name(),
            'registration' => fake()->unique()->randomNumber(),
            'email' => fake()->unique()->safeEmail(),
            'permission' => $permission,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => null,
            'status' => true,
        ];
    }

}
