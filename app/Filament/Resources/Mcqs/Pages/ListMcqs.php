<?php

namespace App\Filament\Resources\Mcqs\Pages;

use App\Filament\Resources\Mcqs\McqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMcqs extends ListRecords
{
    protected static string $resource = McqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
