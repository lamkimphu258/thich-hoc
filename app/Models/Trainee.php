<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainee extends UuidModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'username',
        'password'
    ];

    /**
     * @return BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}
