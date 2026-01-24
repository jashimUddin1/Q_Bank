<?php

namespace App\Filament\Resources\AcademicClasses;

use App\Filament\Resources\AcademicClasses\Pages\CreateAcademicClass;
use App\Filament\Resources\AcademicClasses\Pages\EditAcademicClass;
use App\Filament\Resources\AcademicClasses\Pages\ListAcademicClasses;
use App\Filament\Resources\AcademicClasses\Schemas\AcademicClassForm;
use App\Filament\Resources\AcademicClasses\Tables\AcademicClassesTable;
use App\Models\AcademicClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademicClassResource extends Resource
{
    protected static ?string $model = AcademicClass::class;

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    public static function getNavigationLabel(): string
    {
        return 'Classes';
    }

    public static function form(Schema $schema): Schema
    {
        return AcademicClassForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicClassesTable::configure($table);
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
            'index' => ListAcademicClasses::route('/'),
            // 'create' => CreateAcademicClass::route('/create'),
            // 'edit' => EditAcademicClass::route('/{record}/edit'),
        ];
    }
}
