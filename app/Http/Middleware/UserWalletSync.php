<?php

namespace App\Http\Middleware;

use Akaunting\Money\Currency;
use App\Models\Asset;
use Bavix\Wallet\Models\Wallet;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UserWalletSync
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Cache::remember('asset-sync-' . request()->user()->id, now()->addHours(24), function() use ($request){
            $assets = Asset::query()->where('type', 'crypto')->pluck('name', 'symbol');
            $wallet_types = [...$assets->toArray()];

            foreach ($wallet_types as $symbol => $type) {
                $symbol = $symbol == 0 ? $request->user()->currency : $symbol;
                if (!$request->user()->hasWallet($symbol)) {
                    $request->user()->createWallet([
                        'name' => $type,
                        'meta' => ['currency' => $symbol],
                        'decimal_places' => config("money.currencies.{$symbol}.precision"),
                        'slug' => $symbol
                    ]);
                }
            }

            if(!$request->user()->wallet()->exists()){
                $request->user()->wallet->save();
            }
        });

        return $next($request);
    }
}
