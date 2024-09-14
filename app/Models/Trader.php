<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addMember(User $user, int $amount)
    {
        $this->members()->create([
            'user_id' => $user->id,
            'amount' => $amount * 100,
            'profit' => 0,
        ]);
    }

    public function copiedBy(User $user)
    {
        return $this->members->where('user_id', $user->id)->count() > 0;
    }

    public function members()
    {
        return $this->hasMany(Copier::class);
    } 
}
