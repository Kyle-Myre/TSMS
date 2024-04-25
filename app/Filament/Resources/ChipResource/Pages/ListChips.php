<?php

namespace App\Filament\Resources\ChipResource\Pages;

use App\Filament\Resources\ChipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChips extends ListRecords
{
    protected static string $resource = ChipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
