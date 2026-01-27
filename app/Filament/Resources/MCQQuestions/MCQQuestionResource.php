<?php

namespace App\Filament\Resources\MCQQuestions;

use BackedEnum;
use Filament\Tables\Table;
use App\Models\MCQ_Question;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\MCQQuestions\Pages\EditMCQQuestion;
use App\Filament\Resources\MCQQuestions\Pages\ListMCQQuestions;
use App\Filament\Resources\MCQQuestions\Pages\CreateMCQQuestion;
use App\Filament\Resources\MCQQuestions\Schemas\MCQQuestionForm;
use App\Filament\Resources\MCQQuestions\Tables\MCQQuestionsTable;

class MCQQuestionResource extends Resource
{
    protected static ?string $model = MCQ_Question::class;
    protected static ?string $slug = 'mcq_questions';
    protected static ?string $title = 'MCQ';
    protected static ?string $modelLabel = 'MCQ Questions';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'MCQ Question';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    public static function form(Schema $schema): Schema
    {
        return MCQQuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MCQQuestionsTable::configure($table);
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
            'index' => ListMCQQuestions::route('/'),
            'create' => CreateMCQQuestion::route('/create'),
            'edit' => EditMCQQuestion::route('/{record}/edit'),
        ];
    }
}
