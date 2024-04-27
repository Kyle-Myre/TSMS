<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\User;
use App\Models\Chip;
use App\Models\Staff;
use App\Models\Allocation;
use App\Models\Assignment;
use App\Models\Entity;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Overview extends BarChartWidget
{
    protected static ?string $heading = 'Overview';

    protected function getData(): array
    {
        $staff = Trend::model(Staff::class)
            ->between(
                start: now()->subMonths(),
                end: now(),
            )
            ->perMonth()
            ->count();

        $entity = Trend::model(Entity::class)
            ->between(
                start: now()->subMonths(),
                end: now(),
            )
            ->perMonth()
            ->count();

        $allocation = Trend::model(Allocation::class)
            ->between(
                start: now()->subMonths(),
                end: now(),
            )
            ->perMonth()
            ->count();

        $chip = Trend::model(Chip::class)
            ->between(
                start: now()->subMonths(),
                end: now(),
            )
            ->perMonth()
            ->count();

        $assignment = Trend::model(Assignment::class)
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
                    'label' => 'Staff',
                    'data' => $staff->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color
                ],
                [
                    'label' => 'Entity',
                    'data' => $entity->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color
                ],
                [
                    'label' => 'Allocation',
                    'data' => $allocation->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color
                ],
                [
                    'label' => 'Chip',
                    'data' => $chip->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color
                ],
                [
                    'label' => 'Assignment',
                    'data' => $assignment->map(fn(TrendValue $value) => $value->aggregate),
                    'backgroundColor' => $Color, 
                    'borderColor' => $Color 
                ],
            ],
            'labels' => $staff->map(fn(TrendValue $value) => $value->date),
        ];
    }
}