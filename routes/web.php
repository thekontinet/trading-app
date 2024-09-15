<?php

use App\Http\Controllers\CopyTradingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CryptoDepositController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WithdrawController;
use App\Http\Middleware\UserWalletSync;
use Illuminate\Support\Facades\Route;

Route::get('/', PageController::class);
Route::get('page/{slug}', PageController::class)->name('pages');

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified', UserWalletSync::class])
    ->name('dashboard');

Route::middleware(['auth',  UserWalletSync::class])->group(function () {
    Route::resource('deposits', CryptoDepositController::class)->only('create', 'store');
    Route::resource('transfers', TransferController::class)->only('create', 'store');
    Route::resource('transactions', TransactionController::class)->only('show', 'index');
    Route::resource('withdraws', WithdrawController::class)->only('create', 'store');
    Route::resource('upgrade', SubscriptionController::class)->only('index', 'store');
    Route::resource('copy-trades', CopyTradingController::class)->only('index', 'store', 'show', 'destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
