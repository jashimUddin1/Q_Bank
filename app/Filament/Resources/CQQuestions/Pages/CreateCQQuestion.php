<?php

namespace App\Filament\Resources\CQQuestions\Pages;

use App\Filament\Resources\CQQuestions\CQQuestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCQQuestion extends CreateRecord
{
    protected static string $resource = CQQuestionResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
