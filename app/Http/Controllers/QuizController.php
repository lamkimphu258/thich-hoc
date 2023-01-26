<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Quiz;
use App\Models\QuizEnrollment;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(
        Course $course,
        Quiz $quiz,
    ) {
        // $questions = $quiz->questions();
        // $questionWithAnswer = $questions->with('answers')->get();
        // foreach ($questionWithAnswer as $temp) {
        //     dd($temp->answers);
        // }
        return view('quizzes.show', [
            'quiz' => $quiz,
            'course' => $course,
        ]);
    }

    public function submitAnswers(
        Course $course,
        Quiz $quiz,
        Request $request
    ) {
        $inputData = $request->except('_token');
        if (count($inputData) !== $quiz->questions()->count()) {
            return back()->withErrors(['msg' => 'You must answer all questions'])->withInput();
        }

        $errors = [];
        foreach ($quiz->questions as $question) {
            $answerId = $request->all()[$question->id];
            $correctAnswerId = $question->answers()->where('is_correct', true)->first()->id;
            if ($answerId !== $correctAnswerId) {
                $errors[$question->id] = "Reason not correct";
            }
        }

        if (empty($errors)) {
            $enrollment = new QuizEnrollment();
            $enrollment->quiz_id = $quiz->id;
            $enrollment->course_id = $course->id;
            $enrollment->trainee_id = auth('trainee')->user()->id;
            $enrollment->finished_at = now();
            $enrollment->save();

            $nbOfQuizEnrollment = QuizEnrollment::where([
                'course_id' => $course->id,
                'trainee_id' => auth('trainee')->user()->id,
            ])->count();

            if ($nbOfQuizEnrollment === $course->quizzes()->count()) {
                $courseEnrollment = new CourseEnrollment();
                $courseEnrollment->course_id = $course->id;
                $courseEnrollment->trainee_id = auth()->user()->id;
                $courseEnrollment->finished_at = now();
                $courseEnrollment->save();
            }

            return redirect(route('courses.show', ['course' => $course]));
        }

        $errors['msg'] = 'You answer wrong some questions, please check again. Wrong answer will have question with red color';
        return back()->withErrors($errors)->withInput($inputData);
    }
}
