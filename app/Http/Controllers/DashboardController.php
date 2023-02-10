<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function show()
    {
        $nbOfComplementCourse = auth('trainee')->user()->courses()->count();
        $nbOfComplementQuiz = auth('trainee')->user()->quizzes()->count();
        $totalCourses = Course::all()->count();
        $totalQuizzes = Quiz::all()->count();
        $defaultColors = ['#6D28D9', '#BEBEBE'];
        $defaultLabels = ['Completed', 'Total'];

        $courseChart = (new LarapexChart)->setTitle('Completed Courses')
            ->setDataset([$nbOfComplementCourse, $totalCourses])
            ->setLabels($defaultLabels)
            ->setColors($defaultColors);

        $quizChart = (new LarapexChart)->setTitle('Completed Quizzes')
            ->setDataset([$nbOfComplementQuiz, $totalQuizzes])
            ->setLabels($defaultLabels)
            ->setColors($defaultColors);

        return view('dashboard', [
            'courseChart' => $courseChart,
            'quizChart' => $quizChart,
        ]);
    }
}
