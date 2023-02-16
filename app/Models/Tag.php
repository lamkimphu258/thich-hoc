<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsTo
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
