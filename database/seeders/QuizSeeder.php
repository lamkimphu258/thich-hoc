<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Quiz;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('quizzes');

        $this->call([
            EnrollmentSeeder::class,
        ]);

        $courses = Course::all();

        foreach ($courses as $course) {
            Quiz::factory()->count(10)->create([
                'course_id' => $course->id
            ]);
        }
    }
}
