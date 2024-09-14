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
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rio');
            $table->integer('pnl');
            $table->integer('share_percent');
            $table->integer('wins');
            $table->integer('losses');
            $table->integer('copiers');
            $table->integer('max_copiers');
            $table->unsignedInteger('min_amount');
            $table->timestamps();
        });

        Schema::create('copiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trader_id');
            $table->foreignId('user_id');
            $table->unsignedInteger('amount');
            $table->integer('profit');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copiers');
        Schema::dropIfExists('traders');
    }
};
