<?php
namespace App\Models\Traits;
use App\Models\Subscription;

trait HasSubscription
{
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}