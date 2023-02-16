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
    public function run(): void
    {
        $this->truncate('quizzes');

        $this->call([
            CourseEnrollmentSeeder::class,
        ]);

        $courses = Course::all()->take(5);

        foreach ($courses as $course) {
            Quiz::factory()->count(5)->create([
                'course_id' => $course->id
            ]);
        }

        $this->call([
            QuizEnrollmentSeeder::class,
        ]);
    }
}
