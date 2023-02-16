<?php

namespace App\Filament\Resources\Traits;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Collection;

trait HasLineChartFilter
{
  /**
   * @return array<string,mixed>
   */
  protected function getData(): array
  {
    return $this->getDataBy($this->filter);
  }

  /**
   * @return array<string,mixed>
   */
  private function getDataBy(
    $filter,
  ): array {
    $defaultLineColor = '#6b7280';
    $data = $this->getTrendDataBy($filter, $this->modelClassName);

    return [
      'datasets' => [
        [
          'label' => $this->modelName,
          'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
          'borderColor' => $this->lineColor ?? $defaultLineColor,
        ],
      ],
      'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
  }

  private function getTrendDataBy(
    string $filter,
    string $modelName
  ): Collection {
    return match ($filter) {
      'byHour' => Trend::model($modelName)
        ->between(
          start: now()->startOfDay(),
          end: now()->endOfDay(),
        )
        ->perHour()
        ->count(),
      'byDay' => Trend::model($modelName)
        ->between(
          start: now()->startOfMonth(),
          end: now()->endOfMonth(),
        )
        ->perDay()
        ->count(),
      'byMonth' => Trend::model($modelName)
        ->between(
          start: now()->startOfYear(),
          end: now()->endOfYear(),
        )
        ->perMonth()
        ->count(),
      'byYear' => Trend::model($modelName)
        ->between(
          start: $modelName::query()->orderBy('created_at', 'asc')->limit(1)->first()->created_at,
          end: $modelName::query()->orderBy('created_at', 'desc')->limit(1)->first()->created_at,
        )
        ->perYear()
        ->count(),
    };
  }

  protected function getFilters(): ?array
  {
    return [
      'byHour' => 'By Hour',
      'byDay' => 'By Day',
      'byMonth' => 'By Month',
      'byYear' => 'By Year',
    ];
  }

  protected function getHeading(): string
  {
    return $this->modelName . ' Trend';
  }
}
