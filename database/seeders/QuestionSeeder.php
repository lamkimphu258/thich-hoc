<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('questions');

        $this->call([
            QuizSeeder::class,
        ]);

        Quiz::all()->each(function ($quizz) {
            Question::factory()
                ->count(10)
                ->create([
                    'quiz_id' => $quizz->id,
                ]);
        });
    }
}
