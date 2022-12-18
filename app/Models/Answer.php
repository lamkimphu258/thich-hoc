<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends UuidModel
{
    use HasFactory;

    protected $fillable = [
        'answer',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
