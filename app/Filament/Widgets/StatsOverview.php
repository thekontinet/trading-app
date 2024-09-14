<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users',  fn() => User::where('is_admin', false)->count())
                ->icon('heroicon-o-users'),
            
            Stat::make('Pending Transactions',  fn() => Transaction::where('confirmed', false)->count())
                ->icon('heroicon-o-arrow-path'),
        ];
    }
}
