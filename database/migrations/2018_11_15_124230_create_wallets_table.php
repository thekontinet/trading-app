<?php

declare(strict_types=1);

use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create($this->table(), static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('holder'); // Morphs creates `holder_type` and `holder_id` columns
            $table->string('name', 150);
            $table->string('currency', 100)->nullable();
            $table->string('slug', 150)  // Limiting the length to 150 characters
            ->index();
            $table->uuid('uuid')
                ->unique();
            $table->string('description', 191)  // Optional, limiting to 191 characters
            ->nullable();
            $table->json('meta')
                ->nullable();
            $table->decimal('balance', 64, 0)
                ->default(0);
            $table->unsignedSmallInteger('decimal_places')
                ->default(2);
            $table->timestamps();

            // Reduce the size of columns in unique constraints to avoid hitting the key length limit
            $table->unique(['holder_type', 'holder_id', 'slug']);
        });

        Schema::table($this->transactionTable(), function (Blueprint $table) {
            $table->foreign('wallet_id')
                ->references('id')
                ->on($this->table())
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop($this->table());
    }

    private function table(): string
    {
        return (new Wallet())->getTable();
    }

    private function transactionTable(): string
    {
        return (new Transaction())->getTable();
    }
};

