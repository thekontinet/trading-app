<?php

namespace Database\Seeders;

use App\Libs\CoinGecko;
use App\Models\Asset;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\CryptoService;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        foreach(config('money.currencies') as $code => $currency){
            if(isset($currency['type']) && ($currency['type'] === 'crypto'))
            {
                Asset::query()->create([
                    'name' => $currency['name'],
                    'type' => 'crypto',
                    'symbol' => $code,
                    // TODO: Set address to null, should be fillabel from admin
                    'address' => $code === 'USDT' || $code === 'BTC' ? "0x{$code}USDT" : null, 
                    'logo_path' => app(CryptoService::class)->coinImage($currency['name'])
                ]);
            }
        }
        
        Cache::clear();
    }
}
