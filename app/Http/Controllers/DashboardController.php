<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function show()
    {
        $nbOfComplementCourse = auth('trainee')->user()->courses()->count('courses.id');
        $totalCourses = Course::count('id');
        $defaultColors = ['#6D28D9', '#BEBEBE'];
        $defaultLabels = ['Completed', 'Total'];

        $courseChart = (new LarapexChart)->setTitle('Completed Courses')
            ->setDataset([$nbOfComplementCourse, $totalCourses])
            ->setLabels($defaultLabels)
            ->setColors($defaultColors);

        return view('dashboard', [
            'courseChart' => $courseChart,
        ]);
    }
}
