<?php

namespace App\Filament\Resources\MCQQuestions\Pages;

use App\Filament\Resources\MCQQuestions\MCQQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMCQQuestion extends EditRecord
{
    protected static string $resource = MCQQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
