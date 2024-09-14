<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copier extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function trader()
    {
        return $this->belongsTo(Trader::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
