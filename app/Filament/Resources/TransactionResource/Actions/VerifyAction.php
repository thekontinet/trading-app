<?php

namespace App\Filament\Resources\TransactionResource\Actions;

use App\Services\CryptoService;
use App\Services\WalletService;
use Closure;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;

class VerifyAction extends Action
{
    use CanCustomizeProcess;

    protected ?Closure $mutateRecordDataUsing = null;

    public static function getDefaultName(): ?string
    {
        return 'confirmation';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(fn($record) => $record->confirmed ? 'Disapprove' : 'Approved');

        $this->action(function (): void {
            $this->process(function (array $data, Model $record, Table $table) {
                if(!$record->confirmed){
                    $record->wallet->confirm($record);

                    //Check if its a deposit and add the balance to the fiat wallet
                    if($record->meta['funding'] ?? false){
                        app(WalletService::class)->transfer($record->wallet, $record->wallet->holder->wallet, money($record->wallet->balance, $record->wallet->currency)->getValue());
                    }
                }else{
                    $record->wallet->resetConfirm($record);
                }
            });

            $this->success();
        });
    }

    public function mutateRecordDataUsing(?Closure $callback): static
    {
        $this->mutateRecordDataUsing = $callback;

        return $this;
    }
}
