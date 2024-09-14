<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Services\WalletService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvestmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'investments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('trader.name'),
                Tables\Columns\TextColumn::make('amount')
                    ->money('USD', 100),
                Tables\Columns\TextInputColumn::make('profit')
                    ->getStateUsing(fn($record) => $record->profit / 100)
                    ->updateStateUsing(fn($record, $state) => $record->update(['profit' => $state * 100])),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('end')
                    ->requiresConfirmation()
                    ->action(function($record){
                        app(WalletService::class)->deposit(
                            $record->user->wallet,
                            $record->profit / 100 + $record->amount / 100
                        );
                
                        $record->delete();
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }
}
