<?php
namespace App\Services;
use App\Libs\CoinGecko;

class CryptoService
{
    public function __construct(private coinGecko $cryptoProvider){}

    public function coinImage(string $coinName)
    {
         return $this->cryptoProvider->coin($coinName)['image']['thumb'];
    }

    public function coinPrice(string $coinName, string $currency)
    {
         return $this->cryptoProvider->coinPrice($coinName, $currency);
    }

    public function convertToFiatEquivalent(int | float $amount, string $coinName, string $currency): float {
        $coinPrice = $this->cryptoProvider->coinPrice($coinName, $currency);
        return $amount * $coinPrice;
    }

    public function convertToCoinEquivalent(int | float $amount, string $coinName, string $currency) : float {
        $coinPrice = $this->cryptoProvider->coinPrice($coinName, $currency);
        return $amount / $coinPrice;
    }
}