<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseTag;
use App\Models\Quiz;
use App\Models\QuizTag;
use App\Models\Tag;
use Database\Seeders\Traits\HasTruncate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class TagSeeder extends Seeder
{
    use HasTruncate;

    private const TAG_NAMES = [
        'html',
        'css',
        'javascript',
        'react',
        'vue',
        'nextjs',
        'php',
        'symfony',
        'laravel',
        'docker',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->clearOldData();
        $this->call([
            AnswerSeeder::class
        ]);

        $this->seedTags();
        $tags = Tag::all();

        $this->assignTagToCourse($tags);
        $this->assignTagToQuiz($tags);
    }

    /**
     * @return void
     */
    private function clearOldData(): void
    {
        $this->truncate('tags');
        $this->truncate('course_tags');
        $this->truncate('quiz_tags');
    }

    /**
     * @return void
     */
    private function seedTags(): void
    {
        foreach (self::TAG_NAMES as $tagName) {
            Tag::factory()->create([
                'name' => $tagName
            ]);
        }
    }

    private function assignTagToCourse(Collection $tags): void
    {
        Course::all()->each(function ($course) use ($tags) {
            foreach ($tags->random(rand(1, $tags->count())) as $tag) {
                CourseTag::factory()->create([
                    'course_id' => $course->id,
                    'tag_id' => $tag->id,
                ]);
            }
        });
    }

    private function assignTagToQuiz(Collection $tags): void
    {
        Quiz::all()->each(function ($quiz) use ($tags) {
            foreach ($tags->random(rand(1, $tags->count())) as $tag) {
                QuizTag::factory()->create([
                    'quiz_id' => $quiz->id,
                    'tag_id' => $tag->id,
                ]);
            }
        });
    }
}
