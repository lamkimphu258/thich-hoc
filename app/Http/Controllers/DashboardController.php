<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function show()
    {
        $nbOfCompletedCourse = auth('trainee')->user()->courses()->count();
        $nbOfCompletedQuiz = auth('trainee')->user()->quizzes()->count();
        $totalCourses = Course::all()->count();
        $totalQuizzes = Quiz::all()->count();
        $defaultColors = ['#6D28D9', '#BEBEBE'];
        $defaultLabels = ['Completed', 'Total'];

        $courseChart = (new LarapexChart)->setTitle('Completed Courses')
            ->setDataset([$nbOfCompletedCourse, $totalCourses - $nbOfCompletedCourse])
            ->setLabels($defaultLabels)
            ->setColors($defaultColors);

        $quizChart = (new LarapexChart)->setTitle('Completed Quizzes')
            ->setDataset([$nbOfCompletedQuiz, $totalQuizzes - $nbOfCompletedQuiz])
            ->setLabels($defaultLabels)
            ->setColors($defaultColors);

        return view('dashboard', [
            'courseChart' => $courseChart,
            'quizChart' => $quizChart,
        ]);
    }
}
