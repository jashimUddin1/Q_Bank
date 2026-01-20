<?php

namespace App\Filament\Resources\Mcqs;

use App\Filament\Resources\Mcqs\Pages\CreateMcq;
use App\Filament\Resources\Mcqs\Pages\EditMcq;
use App\Filament\Resources\Mcqs\Pages\ListMcqs;
use App\Filament\Resources\Mcqs\Schemas\McqForm;
use App\Filament\Resources\Mcqs\Tables\McqsTable;
use App\Models\Mcq;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class McqResource extends Resource
{
    protected static ?string $model = Mcq::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return McqForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return McqsTable::configure($table);
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
            'index' => ListMcqs::route('/'),
            'create' => CreateMcq::route('/create'),
            'edit' => EditMcq::route('/{record}/edit'),
        ];
    }
}
