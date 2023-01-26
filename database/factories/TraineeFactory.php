<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainee>
 */
class TraineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->email(),
            'name' => fake()->unique()->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => Carbon::parse(Carbon::now()->subDay(fake()->numberBetween(0, 900))),
        ];
    }
    /**
     * @return TraineeFactory
     */
    public function verified(): TraineeFactory
    {
        return $this->state(function () {
            return [
                'email_verified_at' => now(),
            ];
        });
    }
}
