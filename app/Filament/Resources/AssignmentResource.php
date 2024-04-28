<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AssignmentResource\Pages;
use App\Filament\Resources\AssignmentResource\RelationManagers;
use App\Models\Assignment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Webbingbrasil\FilamentAdvancedFilter\Filters\BooleanFilter;
use Webbingbrasil\FilamentAdvancedFilter\Filters\TextFilter;
use Webbingbrasil\FilamentAdvancedFilter\Filters\DateFilter;
use Webbingbrasil\FilamentAdvancedFilter\Filters\NumberFilter;
use App\Models\Chip;
use App\Models\Staff;

class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $activeNavigationIcon = "heroicon-s-inbox";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('chip_id')
                    ->label('Chip')
                    ->required()
                    ->options(Chip::all()->pluck('telephone', 'id')),

                Forms\Components\Select::make('staff_id')
                    ->label('Staff')
                    ->required()
                    ->options(
                        Staff::all()->pluck('last_name', 'id')
                    ),

                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chip.telephone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff.first_name')
                    ->label('First Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff.last_name')
                    ->label('Last Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TextFilter::make('chip')->relationship('chip', 'telephone')->default(TextFilter::CLAUSE_CONTAIN),
                TextFilter::make('First Name')->relationship('staff', 'first_name')->default(TextFilter::CLAUSE_CONTAIN),
                TextFilter::make('Last Name')->relationship('staff', 'last_name')->default(TextFilter::CLAUSE_CONTAIN),

                TextFilter::make('description'),
                DateFilter::make('date'),
                DateFilter::make('created_at'),
                DateFilter::make('updated_at'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssignments::route('/'),
            'create' => Pages\CreateAssignment::route('/create'),
            'edit' => Pages\EditAssignment::route('/{record}/edit'),
        ];
    }
}
