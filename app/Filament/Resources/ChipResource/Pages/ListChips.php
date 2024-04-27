<?php

namespace App\Filament\Resources\ChipResource\Pages;

use App\Filament\Resources\ChipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChips extends ListRecords
{
    protected static string $resource = ChipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
