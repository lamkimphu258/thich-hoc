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
    ];

    /**
     * @return BelongsToMany
     */
    public function trainees(): BelongsToMany
    {
        return $this->belongsToMany(Trainee::class, 'enrollments');
    }

    /**
     * @return HasMany
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
