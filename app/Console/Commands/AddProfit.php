<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\TradeService;
use Illuminate\Console\Command;

class AddProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-profit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TradeService $tradeService)
    {
        $users = User::where(['trading_signal' => 0])->get();

        foreach ($users as $user) {
            $tradeService->updateUserProfit($user);
        }
    }
}
