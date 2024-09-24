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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('signal_strength')->default(0);
            $table->string('image_path')->nullable();
            $table->string('country')->nullable();
            $table->string('account_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('signal_strength');
            $table->dropColumn('image_path');
            $table->dropColumn(columns: 'country');
            $table->dropColumn('account_type');
        });
    }
};
