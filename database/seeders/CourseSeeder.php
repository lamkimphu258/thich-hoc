<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Traits\HasTruncate;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    use HasTruncate;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->truncate('courses');
        Course::factory()
            ->count(10)
            ->create([
                'thumbnail' => 'thumbnails/placeholder.png',
            ]);
    }
}
