<?php

namespace App\Filament\Resources\CourseResource\Widgets;

use App\Filament\Resources\Traits\HasLineChartFilter;
use App\Models\Course;
use Filament\Widgets\LineChartWidget;

class CourseLineChartWidget extends LineChartWidget
{
    use HasLineChartFilter;

    protected static ?string $heading = 'Chart';

    public ?string $filter = 'byHour';

    private string $modelClassName = Course::class;

    private string $modelName = 'Course';

    private string $lineColor = '#8F0E81';
}
