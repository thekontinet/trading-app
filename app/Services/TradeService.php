<?php

namespace App\Services;

use App\Models\User;

class TradeService
{
    public function updateUserProfit(User $user)
    {
        $tradingSignal = $user->signal_strength; // Should be between 0 and 100

        if($tradingSignal === 0) return false;


        // Update the user's balance with the calculated profit
        foreach ($user->investments as $investment) {
            // Calculate profit based on trading signal (percentage of the investment price)
            $profit = ($investment->amount * $tradingSignal) / 1000;
            $investment->update(['profit' => $investment->profit + $profit]);
        }

        return "User's balance updated successfully.";
    }
}
