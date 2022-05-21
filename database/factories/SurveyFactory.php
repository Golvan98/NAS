<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\Student;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['First Year Survey', 'Second Year Survey', 'Third Year Survey', 'Fourth Year Survey', 'Fifth Year Survey']),
            'school_year' => $this->faker->numberBetween(1, 4),
            'active' => $this->faker->boolean(),
        ];
    }
}
