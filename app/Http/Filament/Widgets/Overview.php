<?php

namespace App\Filament\Widgets;

use App\Models\Allocation;
use App\Models\Assignment;
use App\Models\Chip;
use App\Models\Entity;
use App\Models\Staff;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class Overview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Staff', Staff::count())
                ->description("Current registered staff Members")
                ->descriptionIcon("heroicon-o-identification", IconPosition::Before)
                ->chart([Staff::min('id'), Staff::min('id')])
                ->color('success'),

            Card::make('Entity', Entity::count())
                ->description("Current registered entities")
                ->descriptionIcon("heroicon-o-user-group", IconPosition::Before)
                ->chart([Entity::min('id'), Entity::max('id')])
                ->color('success'),

            Card::make('Allocation', Allocation::count())
                ->description("Current registered allocations")
                ->descriptionIcon("heroicon-o-credit-card", IconPosition::Before)
                ->chart([Allocation::min('id'), Allocation::max('id')])
                ->color('success'),

            Card::make('Assignment', Assignment::count())
                ->description("Current registered assignments")
                ->descriptionIcon("heroicon-o-clipboard-document-check", IconPosition::Before)
                ->chart([Assignment::min("id"), Assignment::max("id")])
                ->color('success'),

            Card::make('Chip', Chip::count())
                ->description("Current registered chips")
                ->descriptionIcon("heroicon-o-phone", IconPosition::Before)
                ->chart([Chip::min("id"), Chip::max("id")])
                ->color('success'),

            Card::make('User', User::count())
                ->description("Current user assignments")
                ->descriptionIcon("heroicon-o-user", IconPosition::Before)
                ->chart([User::min("id"), User::max("id")])
                ->color('success'),
        ];
    }
}
