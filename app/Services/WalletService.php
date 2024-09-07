<?php
namespace App\Services;
use App\Models\Transaction;
use App\Models\Wallet;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Internal\Exceptions\TransactionFailedException;

class WalletService
{
    public function __construct(
        private CryptoService $cryptoService,
    ){}
    public function deposit(Wallet $wallet, int | float $amount, bool $confirmed = true) : ?Transaction
    {
        if ($amount <= 0) {
            throw new TransactionFailedException('You can only swap crypto');
        }

        $convertedAmount = (double) $amount * config("money.currencies.{$wallet->currency}.subunit");
        return $wallet->deposit((string) $convertedAmount, null, $confirmed);
    }

    public function withdraw(Wallet $wallet, int | float $amount, bool $confirmed = true) : ?Transaction
    {
        try{
            if ($amount <= 0) {
                throw new TransactionFailedException('You can only swap crypto');
            }
    
            $convertedAmount = $amount * config("money.currencies.{$wallet->currency}.subunit");
            return $wallet->withdraw((int) $convertedAmount, null, $confirmed);
        }catch(BalanceIsEmpty){
            throw new TransactionFailedException('wallet balance is empty');
        }
    }

    public function transfer(Wallet $sender, Wallet $reciver, int | float $amount) : Transaction
    {
        if ($this->sameWalletType($sender, $reciver)) {
            throw new TransactionFailedException('You can only tranfer from fiat currency to crypto currency or vice versa') ;
        }

        $convertedAmount = $this->walletIsCrypto($reciver) ?
            $this->cryptoService->convertToCoinEquivalent($amount, $reciver->name, $sender->currency):
            $this->cryptoService->convertToFiatEquivalent($amount, $sender->name, $reciver->currency);

        $this->withdraw($sender, $amount);
        return  $this->deposit($reciver, $convertedAmount);
    }

public function swapCoin(Wallet $sender, Wallet $receiver, int | float $amount) : ?Transaction
{
    if (!$this->walletIsCrypto($receiver) || !$this->sameWalletType($sender, $receiver)) {
        return throw new TransactionFailedException('You can only swap crypto currencies');
    }

    // Convert the amount to the receiver's currency equivalent if needed
    $fiatAmount = $this->cryptoService->convertToFiatEquivalent($amount, $sender->name, 'USD');
    $convertedAmount = $this->cryptoService->convertToCoinEquivalent($fiatAmount, $receiver->name, 'USD');

    $this->withdraw($sender, $amount);
    return $this->deposit($receiver, $convertedAmount);
}

    public function walletIsCrypto(Wallet $wallet): bool
    {
        return  config("money.currencies.{$wallet->currency}.type") === 'crypto';
    }

    public function sameWalletType(Wallet $firstWallet, Wallet $secondWallet) : bool
    {
        return  $this->walletIsCrypto($firstWallet) && $this->walletIsCrypto($secondWallet);
    }

    public function sameWallet(Wallet $firstWallet, Wallet $secondWallet) : bool
    {
        return  $firstWallet->name === $secondWallet->name;
    }
}