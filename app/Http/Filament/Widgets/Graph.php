<?php

namespace App\Filament\Widgets;

use App\Models\Allocation;
use App\Models\Chip;
use App\Models\Entity;
use App\Models\Staff;
use App\Models\Assignment;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;



class Graph extends ChartWidget
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

        return [
            'datasets' => [
                [
                    'label' => 'Staff',
                    'data' => $staff->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Entity',
                    'data' => $entity->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Allocation',
                    'data' => $allocation->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Chip',
                    'data' => $chip->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Assignment',
                    'data' => $assignment->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $staff->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
