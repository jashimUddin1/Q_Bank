<?php

namespace App\Filament\Resources\MCQQuestions\Pages;

use App\Filament\Resources\MCQQuestions\MCQQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMCQQuestions extends ListRecords
{
    protected static string $resource = MCQQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
