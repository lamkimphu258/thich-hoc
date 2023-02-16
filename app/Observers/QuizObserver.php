<?php

namespace App\Observers;

use App\Models\Quiz;
use Illuminate\Support\Str;

class QuizObserver
{
    /**
     * Handle the Quiz "created" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function created(Quiz $quiz): void
    {
        //
    }

    /**
     * Handle the Quiz "updated" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function updated(Quiz $quiz): void
    {
        //
    }

    /**
     * Handle the Quiz "deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function deleted(Quiz $quiz): void
    {
        //
    }

    /**
     * Handle the Quiz "restored" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function restored(Quiz $quiz): void
    {
        //
    }

    /**
     * Handle the Quiz "force deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function forceDeleted(Quiz $quiz): void
    {
        //
    }

    /**
     * @return void
     */
    public function creating(Quiz $quiz): void
    {
        $quiz->slug =  Str::slug($quiz->title, '-');
    }
}
