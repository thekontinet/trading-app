<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasExpired()
    {
        return $this->expires_at < now();
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
