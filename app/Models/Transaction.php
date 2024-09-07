<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends \Bavix\Wallet\Models\Transaction
{
    protected $casts = [
        'wallet_id' => 'int',
        'confirmed' => 'bool',
        'meta' => 'json',
        'amount' => 'double',
    ];
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
