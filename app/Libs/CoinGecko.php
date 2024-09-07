<?php

namespace App\Libs;
use Cache;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class CoinGecko
{
   public PendingRequest $client;

   public function __construct(){
        $this->client = Http::baseUrl('api.coingecko.com/api/v3')
        ->withOptions([
            'verify' => false
        ])->withHeaders([
                'Accept' => 'application/json',
                'X-Cg-Demo-Api-Key' => env('COINGECKO_API_KEY')
            ]);
   }

   public function coins()
   {
        $key = 'coin-gecko-coin-list';
        if($coins = Cache::get($key)){
            return $coins;
        }

        $request = $this->client->get('/coins/list');
        $data =  collect($request->json());
        $coins =  $data->keyBy('id');
        Cache::put($key, $coins, now()->addMonth());
        return $coins;
   }

   public function coin(?string $name = null)
   {
        $id = str($name)->slug();
        $key = "coin-gecko-coin-$id";
        return Cache::remember($key, now()->addWeek(), function() use ($id){
            $coinInfo = $this->coins()[strtolower($id)];
            $response = $this->client->get('/coins/' . $coinInfo['id']);
            return $response->json();
        });
   }

   public function coinPrice(string $coinName, string $currency)
   {
        // $key = "coingecko-prices-for-$currency";
        // return $this->client->get('/simple/price',[
        //     'ids' => collect(config('money.currencies'))->where('type', 'crypto')->pluck('name')->map(fn($str) => str($str)->slug()),
        //     'vs_currencies' => collect(config('money.currencies'))->where('type', null)->keys()->map('strtolower'),
        // ])->json("$coinName.$currency");
        return $this->coin($coinName)['market_data']['current_price'][strtolower($currency)];
   }
}