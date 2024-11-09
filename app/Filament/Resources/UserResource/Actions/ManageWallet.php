<?php

namespace App\Filament\Resources\UserResource\Actions;

use App\Models\Wallet;
use App\Services\WalletService;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Forms;

class ManageWallet extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'manage_wallet';
    }
    protected function setUp(): void
    {
        $this->icon('heroicon-o-wallet')
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
        });
    }

}
