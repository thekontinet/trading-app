<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Filament\Resources\AssetResource\RelationManagers;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->readOnly()
                    ->prefixIcon('heroicon-o-cube')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Wallet Address')
                    ->prefixIcon('heroicon-o-wallet')
                    ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'crypto'))
            ->columns([
                Tables\Columns\ImageColumn::make('logo_path')
                    ->label('')
                    ->circular()
                    ->grow(false)
                    ->width(24)
                    ->height(24),
                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn($record) => $record->name . "($record->symbol)")
                    ->description(fn($record) => $record->address)
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([

                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
