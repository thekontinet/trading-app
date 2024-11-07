<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('trade:add-profit', function(\App\Services\TradeService $tradeService){
    $users = \App\Models\User::where('signal_strength', '<>', 0)->get();

    foreach ($users as $user) {
        $tradeService->updateUserProfit($user);
    }

    $this->info("profit added successfully");
    $this->info("Users Affected: {$users->count()}");
});
