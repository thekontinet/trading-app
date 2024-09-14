<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->morphs('trader');
            $table->morphs('wallet');
            $table->morphs('type'); // buy or sell
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('status'); // pending, completed, cancelled;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
