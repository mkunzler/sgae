<?php

namespace Database\Factories;

use App\Enums\EnumCourseModality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enumCourseModality = EnumCourseModality::cases();
        $modality =  fake()->randomElement($enumCourseModality)->value;
        return [
            'name' => fake()->name(),
            'modality' => $modality,
        ];
    }

}
