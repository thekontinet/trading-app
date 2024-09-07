<?php

namespace App\Models;

use App\Services\CryptoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    public $guarded = [];

    public function getImageUrlAttribute(){
        return app(CryptoService::class)->coinImage($this->name);
    }

    public function getPriceAttribute(){
        if($this->type === 'crypto'){
            return app(CryptoService::class)->coinPrice($this->name, auth()->user()->currency) * 100;
        }
        return 0;
    }

    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'name', 'name')->one()->where('holder_id', auth()->id());
    }
}
