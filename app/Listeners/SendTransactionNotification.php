<?php

namespace App\Listeners;

use App\Mail\TransactionNotice;
use App\Models\Transaction;
use Bavix\Wallet\Internal\Events\BalanceUpdatedEvent;
use Bavix\Wallet\Internal\Events\TransactionCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTransactionNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransactionCreatedEvent $event): void
    {
        $transaction = Transaction::query()->find($event->getId());

        if ($transaction->confirmed) {
            Mail::to($transaction->wallet->holder)->send(new TransactionNotice($transaction));
        }
    }
}
