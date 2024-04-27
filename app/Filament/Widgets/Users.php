<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\LineChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class Users extends LineChartWidget
{
    protected static ?string $heading = 'Users';

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->subMonths(),
                end: now(),
            )
            ->perMonth()
            ->count();

        // dd($data);
        $Color = "rgba(34, 197, 94 , 0.62)";

        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }
}
