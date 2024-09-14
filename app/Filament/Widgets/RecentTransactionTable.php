<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\TransactionResource;
use App\Models\Transaction;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentTransactionTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => Transaction::query()->limit(5)->latest()
            )
            ->paginated(false)
            ->headerActions([
                Action::make('See All')->url(TransactionResource::getUrl('index'))
            ])
            ->columns([
                Tables\Columns\TextColumn::make('payable.name')
                    ->label('Account')
                    ->description(fn($record) => $record->payable->email)
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('amount')
                    ->formatStateUsing(fn($record) => money($record->amount, $record->wallet->currency))
                    ->sortable(),
            ]);
    }
}
