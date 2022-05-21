<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\Student;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey_Question>
 */
class SurveyQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'category' => $this->faker->randomElement(['Anxiety', 'Relationships', 'Self-Image', 'Bullying', 'Parent-Separation', 'Stress-Management', 'Peer Pressure', 'Anger-Management', 'Student-Teacher-Conflict', 'Physical-Disability', 'Motivation', 'Student-Teacher-Relationship', 'Cyberbullying', 'Physical-Psychological-Abuse', 'Mourning' ]),
            'type' => $this->faker->word(),
        ];
    }
}
