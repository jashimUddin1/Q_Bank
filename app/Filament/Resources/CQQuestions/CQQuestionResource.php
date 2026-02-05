<?php

namespace App\Filament\Resources\CQQuestions;

use App\Filament\Resources\CQQuestions\Pages\CreateCQQuestion;
use App\Filament\Resources\CQQuestions\Pages\EditCQQuestion;
use App\Filament\Resources\CQQuestions\Pages\ListCQQuestions;
use App\Filament\Resources\CQQuestions\Schemas\CQQuestionForm;
use App\Filament\Resources\CQQuestions\Tables\CQQuestionsTable;
use App\Models\CQ_Question;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CQQuestionResource extends Resource
{
    protected static ?string $model = CQ_Question::class;
     protected static ?string $slug = 'cq_questions';
    protected static ?int $navigationSort = 7; 
    // protected static ?string $navigationLabel = 'CQ Questions';
    protected static ?string $modelLabel = 'CQ Questions';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CQQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CQQuestionsTable::configure($table);
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
            'index' => ListCQQuestions::route('/'),
            'create' => CreateCQQuestion::route('/create'),
            'edit' => EditCQQuestion::route('/{record}/edit'),
        ];
    }
}
