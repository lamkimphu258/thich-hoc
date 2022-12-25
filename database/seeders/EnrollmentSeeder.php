<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
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
                if (random_int(0, 1)) {
                    Enrollment::factory()->create([
                        'trainee_id' => $trainee->id,
                        'course_id' => $course->id
                    ]);
                }
            }
        }
    }
}
