<?php

namespace App\Filament\Resources\ChipResource\Pages;

use App\Filament\Resources\ChipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChip extends EditRecord
{
    protected static string $resource = ChipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
