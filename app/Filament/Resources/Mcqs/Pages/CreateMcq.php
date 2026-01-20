<?php

namespace App\Filament\Resources\Mcqs\Pages;

use App\Filament\Resources\Mcqs\McqResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMcq extends CreateRecord
{
    protected static string $resource = McqResource::class;
}
