<?php

namespace App\Filament\Resources\CQQuestions\Pages;

use App\Filament\Resources\CQQuestions\CQQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCQQuestions extends ListRecords
{
    protected static string $resource = CQQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
