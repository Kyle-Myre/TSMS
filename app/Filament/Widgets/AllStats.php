<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

use App\Models\Allocation;
use App\Models\Assignment;
use App\Models\Chip;
use App\Models\Entity;
use App\Models\Staff;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AllStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Staff', Staff::count())
                ->description("Current registered staff Members")
                ->descriptionIcon("heroicon-o-identification")
                ->chart([Staff::min('id'), Staff::min('id')])
                ->color('success'),

            Card::make('Entity', Entity::count())
                ->description("Current registered entities")
                ->descriptionIcon("heroicon-o-user-group")
                ->chart([Entity::min('id'), Entity::max('id')])
                ->color('success'),

            Card::make('Allocation', Allocation::count())
                ->description("Current registered allocations")
                ->descriptionIcon("heroicon-o-credit-card")
                ->chart([Allocation::min('id'), Allocation::max('id')])
                ->color('success'),

            Card::make('Assignment', Assignment::count())
                ->description("Current registered assignments")
                ->descriptionIcon("heroicon-o-inbox")
                ->chart([Assignment::min("id"), Assignment::max("id")])
                ->color('success'),

            Card::make('Chip', Chip::count())
                ->description("Current registered chips")
                ->descriptionIcon("heroicon-o-phone")
                ->chart([Chip::min("id"), Chip::max("id")])
                ->color('success'),

            Card::make('User', User::count())
                ->description("Current user assignments")
                ->descriptionIcon("heroicon-o-user")
                ->chart([User::min("id"), User::max("id")])
                ->color('success'),
        ];
    }
}
