<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseEnrollment extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'trainee_id',
        'course_id',
        'finished_at',
    ];
}
