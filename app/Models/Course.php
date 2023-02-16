<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
    ];

    /**
     * @return BelongsToMany
     */
    public function trainees(): BelongsToMany
    {
        return $this->belongsToMany(Trainee::class, 'course_enrollments');
    }

    /**
     * @return HasMany
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    /**
     * @return HasMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'course_tags');
    }
}
