<?php

namespace App\Services;
use App\Libs\ProfitApi;

class StockService
{
    public function __construct(
        private ProfitApi $stockApi
    ){}
    public function stockPrice($symbol)
    {
        return $this->stockApi->getPrice($symbol);
    }
    public function stockLogo($symbol)
    {
        return $this->stockApi->getLogo($symbol);
    }
}