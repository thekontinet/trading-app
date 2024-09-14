<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function casts(){
        return [
            'features' => 'json'
        ];
    }

    public function getIntervalAttribute()
    {
        return match(true){
            $this->duration_in_days >= 365 => 'year',
            $this->duration_in_days >= 30 => 'month',
            $this->duration_in_days >= 7 => 'week',
            default => 'day',
        };
    }

    public function subscribe (User $user){
        return Subscription::query()->create([
            'plan_id' => $this->id,
            'user_id' => $user->id,
            'expires_at' => now()->addDays($this->duration_in_days)
        ]);
    }
}
