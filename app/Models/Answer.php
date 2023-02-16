<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends UuidModel
{
    use HasFactory;

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    protected $fillable = [
        'answer',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
