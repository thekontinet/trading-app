<?php

namespace Database\Seeders;

use App\Libs\CoinGecko;
use App\Models\Asset;
use App\Models\Trader;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\CryptoService;
use App\Services\StockService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->make([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ])->firstOrCreate();
        
        // Add all supported crypto wallet
        foreach(config('money.currencies') as $code => $currency){
            if(($currency['type'] ?? null) !== 'crypto'){
                continue;
            }

            Asset::query()->firstOrCreate([
                'name' => $currency['name'],
                'type' => 'crypto',
                'symbol' => $code,
            ],[
                'logo_path' => app(CryptoService::class)->coinImage($currency['name'])
            ]);
        }

        foreach(config('forex') as $name => $symbol){
            Asset::query()->firstOrCreate([
                'name' => $name,
                'type' => 'forex',
                'symbol' => $symbol,
            ],[
                'logo_path' => 'nil'
            ]);
        }

        foreach(config('stocks') as $symbol => $name){
            Asset::query()->firstOrCreate([
                'name' => $name,
                'type' => 'stock',
                'symbol' => $symbol,
            ],[
                'logo_path' => app(StockService::class)->stockLogo($symbol)
            ]);
        }

        Trader::factory(8)->create();
        
        
        // clear existing asset chache data
        Cache::clear();
    }
}
