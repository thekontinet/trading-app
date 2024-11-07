<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function getTitle(): \Illuminate\Contracts\Support\Htmlable|string
    {
        return new HtmlString("
            {$this->record->name}  <span class='text-sm'> - Subscription Plan: {$this->record->subscription?->plan?->name}</span>
        ");
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
