<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UsersTable extends BaseWidget
{
    protected static ?string $heading = "Recent Users";

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()->latest()->where('is_admin', false)->limit(5)
            )
            ->headerActions([
                Action::make('See All')->url(UserResource::getUrl('index'))
            ])
            ->paginated(false)
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
            ]);
    }
}
