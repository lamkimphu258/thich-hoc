<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizEnrollment extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'trainee_id',
        'quiz_id',
        'finished_at',
    ];
}
