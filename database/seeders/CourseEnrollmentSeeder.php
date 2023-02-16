<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Trainee;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;

class CourseEnrollmentSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('course_enrollments');

        $this->call([
            TraineeSeeder::class,
            CourseSeeder::class,
        ]);

        // $trainees = Trainee::all();
        // $courses = Course::all();
        //
        // foreach ($trainees as $trainee) {
        //     foreach ($courses as $course) {
        //         CourseEnrollment::factory()->create([
        //             'trainee_id' => $trainee->id,
        //             'course_id' => $course->id
        //         ]);
        //     }
        // }
    }
}
