<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\InvestmentsRelationManager;
use App\Models\User;
use App\Models\Wallet;
use App\Services\WalletService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_path')
                    ->label('Profile Image')
                    ->disk('public')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('currency')
                    ->options(config('money.supported_currencies'))
                    ->required(),

                Forms\Components\TextInput::make('signal_strength')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->hiddenOn('create')
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->hiddenOn('edit')
            ]);
    }

    public static function table(Table $table): Table
    {
        $currencies = config('money.supported_currencies');
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('email_verified_at')
                    ->label('Email Verified')
                    ->updateStateUsing(fn($record) => $record->forceFill(['email_verified_at' => $record->email_verified_at ? null : now()])->save()),
                Tables\Columns\ToggleColumn::make('blocked')
                    ->updateStateUsing(fn($record) => $record->forceFill(['blocked' => $record->blocked ? false : true])->save()),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('Fund Wallet')
                        ->icon('heroicon-o-wallet')
                        ->form([
                            Forms\Components\Select::make('wallet')
                                ->live()
                                ->options(fn($record) => $record->wallets->pluck('title', 'id'))
                                ->exists('wallets', 'id')
                                ->required(),

                            Forms\Components\Select::make('type')
                                ->options([
                                    'deposit' => 'Deposit',
                                    'withdraw' => 'Withdraw',
                                ])
                                ->in(['deposit', 'withdraw'])
                                ->required(),

                                Forms\Components\TextInput::make('amount')
                                    ->numeric()
                                    ->prefix(function($get){
                                        $wallet = Wallet::query()->find($get('wallet'));
                                        return $wallet ? config("money.currencies.{$wallet->currency}.symbol") : '$';
                                    })
                                    ->minValue(0)
                                    ->required()
                        ])->action(function($data, WalletService $walletService){
                            $wallet = Wallet::query()->find($data['wallet']);
                            $transaction = $walletService->{$data['type']}($wallet, $data['amount']);
                            Notification::make()
                                ->title('Wallet has been updated')
                                ->body("{$transaction->type} transaction has been perform on {$wallet->name} wallet")
                                ->success()
                                ->send();
                        }),
                ])->button(),
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
            InvestmentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
