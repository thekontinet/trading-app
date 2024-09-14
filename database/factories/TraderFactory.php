<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trader>
 */
class TraderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $copiers = rand(100, 800);
        $pnl = Lottery::odds(1, 3)->winner(fn() => rand(1000, 10000))->loser(fn() => -rand(1000, 10000))->choose();
        return [
            'name' => fake()->unique()->name(),
            'rio' => $pnl < 1 ? -rand(60, 90) : rand(100, 400),
            'pnl' => $pnl,
            'share_percent' => rand(5, 30),
            'wins' => rand(5, 100),
            'losses' => rand(5, 100),
            'copiers' => $copiers,
            'max_copiers' => $copiers,
            'min_amount' => rand(20000, 80000),
        ];
    }
}
