<?php

namespace App\Filament\Resources\TraineeResource\Widgets;

use App\Filament\Resources\Traits\HasLineChartFilter;
use App\Models\Trainee;
use Filament\Widgets\LineChartWidget;

class TraineeLineChartWidget extends LineChartWidget
{
    use HasLineChartFilter;

    protected static ?string $heading = 'Chart';

    public ?string $filter = 'byHour';

    private string $modelClassName = Trainee::class;

    private string $modelName = 'Trainee';

    private string $lineColor = '#0113DB';
}
