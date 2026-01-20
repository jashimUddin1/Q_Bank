<?php

namespace App\Filament\Resources\Cqs\Pages;

use App\Filament\Resources\Cqs\CqResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCqs extends ListRecords
{
    protected static string $resource = CqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
