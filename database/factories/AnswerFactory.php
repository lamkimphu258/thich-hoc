<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'answer' => fake()->realText(100),
        ];
    }

    /**
     * @return AnswerFactory
     */
    public function markCorrect(): AnswerFactory
    {
        return $this->state(function () {
            return [
                'is_correct' => true,
            ];
        });
    }
}
