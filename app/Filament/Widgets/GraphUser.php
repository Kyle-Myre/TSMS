<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\User as UserEntity;

class GraphUser extends ChartWidget
{
    protected static ?string $heading = 'Users';

    protected function getData(): array
    {
        $data = Trend::model(UserEntity::class)
        ->between(
            start: now()->subMonths(),
            end: now(),
        )
        ->perMonth()
        ->count();

        // dd($data);

        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
