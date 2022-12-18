<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Trainee;
use Database\Factories\EnrollmentFactory;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EnrollmentSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('enrollments');

        $this->call([
            TraineeSeeder::class,
            CourseSeeder::class,
        ]);

        $trainees = Trainee::all();
        $courses = Course::all();

        foreach ($trainees as $trainee) {
            foreach ($courses as $course) {
                Enrollment::factory()->create([
                    'trainee_id' => $trainee->id,
                    'course_id' => $course->id
                ]);
            }
        }
    }
}
