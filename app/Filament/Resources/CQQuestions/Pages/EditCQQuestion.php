<?php

namespace App\Filament\Resources\CQQuestions\Pages;

use App\Filament\Resources\CQQuestions\CQQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCQQuestion extends EditRecord
{
    protected static string $resource = CQQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
