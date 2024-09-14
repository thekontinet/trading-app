<?php
namespace App\Libs;
use Http;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;

class ProfitApi
{
    private PendingRequest $client;
    public function __construct()
    {
        $this->client = Http::baseUrl('https://api.profit.com/data-api')
            ->withOptions([
                'verify' => false
            ])->withQueryParameters([
                'token' => env('PROFIT_API_KEY')
            ]);
    }

    public function getStock(string $symbol)
    {
        $cacheKey = "profit-stock-data-$symbol";
        return Cache::remember($cacheKey, now()->hour(10), function() use ($symbol){
            return $this->client->get("/market-data/quote/$symbol")->json();
        });
    }

    public function getPrice($symbol)
    {
        return $this->getStock($symbol)['price'];
    }

    public function getLogo($symbol)
    {
        return $this->getStock($symbol)['logo_url'];
    }
}