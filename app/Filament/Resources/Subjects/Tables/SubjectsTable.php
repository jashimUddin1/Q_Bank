<?php

namespace App\Filament\Resources\Subjects\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sub_name')
                    ->label('Subject Name')
                    ->sortable(),

                TextColumn::make('academicClass.name')
                    ->label('Class')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('class_id')->label('Class')->relationship('academicClass', 'name')->preload(),
                   
            ])
            ->filtersLayout(FiltersLayout::AboveContent) 
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
