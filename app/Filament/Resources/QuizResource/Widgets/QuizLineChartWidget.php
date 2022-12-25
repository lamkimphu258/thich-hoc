<?php

namespace App\Filament\Resources\QuizResource\Widgets;

use App\Filament\Resources\Traits\HasLineChartFilter;
use App\Models\Quiz;
use Filament\Widgets\LineChartWidget;

class QuizLineChartWidget extends LineChartWidget
{
    use HasLineChartFilter;

    protected static ?string $heading = 'Chart';

    public ?string $filter = 'byHour';

    private string $modelClassName = Quiz::class;

    private string $modelName = 'Quiz';

    private string $lineColor = '#0E8F75';
}
