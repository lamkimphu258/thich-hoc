<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\QuizEnrollment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View|Factory
    {
        $latestCourse = Course::select('slug', 'title', 'thumbnail', 'description')->orderBy('created_at', 'desc');
        $percents = [];
        $latestCourse->each(function ($course) use (&$percents) {
            $totalQuizzesOfCourse = $course->quizzes()->count('id');
            $nbOfQuizEnrollment = QuizEnrollment::where([
                'course_id' => $course->id,
                'trainee_id' => auth('trainee')->user()->id,
            ])->count('id');

            $percents[] = $totalQuizzesOfCourse === 0 || $nbOfQuizEnrollment === 0 ? 0 : (($nbOfQuizEnrollment / $totalQuizzesOfCourse) * 100);
        });

        return view('courses.index', [
            'courses' => $latestCourse->paginate(25),
            'percents' => $percents,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $quizzes = $course->quizzes;
        $quizzIds = $course->quizzes()->orderBy('created_at', 'desc')->pluck('quizzes.id')->all();
        $quizEnrollments = QuizEnrollment::select('quiz_id')
            ->where('trainee_id', auth()->user()->id)
            ->whereNotNull('finished_at')
            ->whereIn('quiz_id', $quizzIds)->get()
            ->pluck('quiz_id');

        return view('courses.show', [
            'course' => $course,
            'quizzes' => $quizzes,
            'quizEnrollments' => $quizEnrollments,
        ]);
    }
}
