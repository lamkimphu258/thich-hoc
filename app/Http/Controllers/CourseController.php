<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\QuizEnrollment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View|Factory
    {
        $latestCourse = Course::orderBy('created_at', 'desc');
        $courseEnrollments = CourseEnrollment::where([
            'trainee_id' => auth()->user()->id,
        ])
            ->whereIn('course_id', $latestCourse->get()->pluck('id'))
            ->pluck('course_id');

        return view('courses.index', [
            'courses' => $latestCourse->paginate(25),
            'courseEnrollments' => $courseEnrollments,
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
