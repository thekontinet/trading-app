<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Wallet extends \Bavix\Wallet\Models\Wallet 
{
    
    protected $fillable = [
        'holder_type',
        'holder_id',
        'currency',
        'name',
        'slug',
        'uuid',
        'description',
        'meta',
        'balance',
        'decimal_places',
        'created_at',
        'updated_at',
    ];

    public function casts(): array
    {
        return [
            'balance' => 'double',
            'decimal_places' => 'int',
            'meta' => 'json',
        ];
    }

    public function getTitleAttribute()
    {
        return $this->name . ' ' . money($this->balance, $this->currency);
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'slug', 'symbol');
    }
}
