<?php

namespace App\Filament\Resources\Cqs;

use App\Filament\Resources\Cqs\Pages\CreateCq;
use App\Filament\Resources\Cqs\Pages\EditCq;
use App\Filament\Resources\Cqs\Pages\ListCqs;
use App\Filament\Resources\Cqs\Schemas\CqForm;
use App\Filament\Resources\Cqs\Tables\CqsTable;
use App\Models\Cq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CqResource extends Resource
{
    protected static ?string $model = Cq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CqsTable::configure($table);
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
            'index' => ListCqs::route('/'),
            'create' => CreateCq::route('/create'),
            'edit' => EditCq::route('/{record}/edit'),
        ];
    }
}
