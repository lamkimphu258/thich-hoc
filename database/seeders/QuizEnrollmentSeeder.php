<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\QuizEnrollment;
use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class QuizEnrollmentSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('quiz_enrollments');

        // $trainees = Trainee::all();
        // $quizzes = Quiz::all();
        //
        // foreach ($trainees as $trainee) {
        //     foreach ($quizzes as $quiz) {
        //         QuizEnrollment::factory()->create([
        //             'trainee_id' => $trainee->id,
        //             'quiz_id' => $quiz->id
        //         ]);
        //     }
        // }
    }
}
