<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TraderResource\Pages;
use App\Filament\Resources\TraderResource\RelationManagers;
use App\Filament\Resources\TradersResource\RelationManagers\MembersRelationManager;
use App\Models\Trader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TraderResource extends Resource
{
    protected static ?string $model = Trader::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rio')
                    ->hint('Return on investment')
                    ->numeric()
                    ->suffix('%')
                    ->required(),
                Forms\Components\TextInput::make('pnl')
                    ->prefix('$')
                    ->hint('Profit and loss ratio')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('share_percent')
                    ->label('Share Percentage')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('copiers')
                    ->helperText('Number of copiers')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_copiers')
                    ->helperText('Max  number of copiers for the trader')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('wins')
                    ->label('Won Trades')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('losses')
                    ->label('Loss Trades')
                    ->required()
                    ->numeric(),
                
                Forms\Components\TextInput::make('min_amount')
                    ->helperText('Minimum amount users can copy with')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('$')
                    ->formatStateUsing(fn($state) => $state/100)
                    ->dehydrateStateUsing(fn($state) => $state * 100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rio')
                    ->suffix('%')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pnl')
                    ->color(fn($state) => $state == 0 ? null : ($state >= 1 ? 'success' : 'danger'))
                    ->prefix(fn($state) => $state >= 1 ? '+' : '')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('share_percent')
                    ->suffix('%')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('copiers')
                    ->formatStateUsing(fn($record) =>" $record->copiers / $record->max_copiers")
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTraders::route('/'),
            'create' => Pages\CreateTrader::route('/create'),
            'edit' => Pages\EditTrader::route('/{record}/edit'),
        ];
    }
}
